<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    public function index(Request $request)
{
    if ($request->user()) {
        $categories = ['Art', 'History', 'Geography', 'Science', 'Sports'];
        $questions = [];

        // Check if questions are already in session
        if ($request->session()->has('quiz_questions')) {
            $questions = $request->session()->get('quiz_questions');
            Log::info('Questions retrieved from session:', $questions);
        } else {
            // Fetching random questions from each category
            foreach ($categories as $cat) {
                // Fetch 4 random questions from the category
                $query_questions = Question::with(['answers', 'category'])
                    ->whereHas('category', function($query) use ($cat) {
                        $query->where('name', $cat);
                    })
                    ->inRandomOrder()
                    ->limit(4)
                    ->get();

                // Add fetched questions to the main questions array
                foreach ($query_questions as $qq) {
                    $questions[] = $qq;
                }
                
                // Log the fetched questions for each category
                Log::info('Questions fetched from category ' . $cat . ':', $query_questions->toArray());
            }

            // Store questions in the session if found
            if (!empty($questions)) {
                $request->session()->put('quiz_questions', $questions);
                Log::info('Questions stored in session:', $questions);
            } else {
                Log::error('No questions found in the database.');
            }
        }

        // Check if questions were fetched
        if (empty($questions)) {
            return view('quiz')->with('questions', []); // Return empty questions if none found
        }

        // Shuffle questions to randomize their order
        shuffle($questions);

        // Optionally take only the first 10 questions if needed
        $questions = array_slice($questions, 0, 10);

        return view('quiz', ['questions' => $questions]);
    } else {
        return redirect()->route('login'); // Redirect to login if not authenticated
    }
}


    public function results(Request $request)
    {
        // Fetch the quiz from the database
        $quiz = Quiz::where('id', $request->quiz)->first();

        // Ensure all questions are answered
        $questions = $request->session()->get('quiz_questions');  // Retrieve the questions from session
        $answers = $request->all();

        // Validate that all questions have been answered
        foreach ($questions as $question) {
            if (!isset($answers[$question->id])) {
                return back()->with('error', 'You must answer all questions before submitting.');
            }
        }

        // Mark quiz as completed
        $quiz->completed = 1;

        // Initialize results and XP tracking
        $results = [
            'overall' => 0,
            'art' => 0,
            'geography' => 0,
            'history' => 0,
            'science' => 0,
            'sports' => 0
        ];
        $xp = 0; // Initialize XP variable (if applicable)

        // Determine which answers are correct
        foreach ($answers as $key => $value) {
            if (is_numeric($key)) {
                $correct_answer = Answer::where('question_id', $key)->where('correct', 1)->first();
                if ($correct_answer && $correct_answer->answer == $value) { // Check if correct answer exists
                    $question = Question::find($key);
                    $results['overall']++;

                    // Increment the category score
                    $results[strtolower($question->category)]++;
                }
            }
        }

        // Add XP to user (assuming XP needs to be updated)
        Auth::user()->xp += $xp;

        // Update user's category-specific score
        foreach ($results as $category => $value) {
            if ($category != 'overall') {
                [$correct, $total] = explode("/", Auth::user()->$category); // Use property access instead of array
                Auth::user()->$category = ($correct + $value) . "/" . ($total + 2);  // 2 questions per category
            }
        }

        // Save the updated data
        Auth::user()->save();
        $quiz->save();

        // Clear the session questions after quiz completion
        $request->session()->forget('quiz_questions');

        // Redirect to results page
        return view('questions.results', ['results' => $results]);
    }
}