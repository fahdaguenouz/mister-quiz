<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()) {
            if (!session()->has('quiz_questions')) {
                $categories = ['History', 'Art', 'Geography', 'Science', 'Sports'];
                $questions = [];

                foreach ($categories as $cat) {
                    $query_questions = Question::where('category', $cat)
                        ->inRandomOrder()
                        ->limit(4)
                        ->with('answers')
                        ->get();

                    foreach ($query_questions as $qq) {
                        $questions[] = [
                            'id' => $qq->id,
                            'question' => $qq->question,
                            'xp' => $qq->xp,
                            'category' => $qq->category,
                            'answers' => $qq->answers->map(function ($answer) {
                                return [
                                    'id' => $answer->id,
                                    'answer' => $answer->answer,
                                ];
                            })->toArray(),
                        ];
                    }
                }

                shuffle($questions);

                session(['quiz_questions' => $questions]);
            } else {
                $questions = session('quiz_questions');
            }

            $quiz = ['questions' => $questions];

            return view('questions.list', compact('quiz'));
        }

        return redirect()->route('login');
    }



    public function results(Request $request)
    {
        $quizQuestions = session('quiz_questions', []);

        if (empty($quizQuestions)) {
            return redirect()->route('quiz')->with('error', 'No active quiz found.');
        }

       
        session()->forget('quiz_questions');

        $results = [
            'overall' => 0,
            'art' => 0,
            'geography' => 0,
            'history' => 0,
            'science' => 0,
            'sports' => 0
        ];
        $xp = 0;
        $counter  = 0;
        $user = Auth::user();

        foreach ($quizQuestions as $question) {
            $questionId = $question['id'];
            $category = strtolower($question['category']); // Ensure lowercase to match array keys

            if ($request->has("answer_$questionId")) {
                $selectedAnswerId = $request->input("answer_$questionId");

                $correctAnswer = Answer::where('question_id', $questionId)
                    ->where('correct', 1)
                    ->first();
                $counter += 1;
                if ($correctAnswer && $correctAnswer->id == $selectedAnswerId) {
                    $results['overall']++;
                    $results[$category]++;
                    $xp += $question['xp'];
                }
            }
        }

        if ($counter !== 20) {
            return redirect()->route('quiz')->with('error', 'You need to answer all questions');
        }

        $user->xp += $xp;

        foreach ($results as $category => $correctAnswers) {
            if ($category !== 'overall') {
                [$correct, $total] = explode("/", $user[$category] ?? "0/0");
                $user[$category] = ($correct + $correctAnswers) . "/" . ($total + 4);
            }
        }
        $user->save();

        return view('questions.results', ['results' => $results, 'xp' => $xp]);
    }
}
