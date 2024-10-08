<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question; // Ensure this is included
use App\Models\Quiz;
use App\Http\Controllers\QuestionController;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Use QuestionController to fetch questions
        $questionController = new QuestionController();
        return $questionController->index($request);
    }
    
        public function submit(Request $request)
        {
            // Validate that the user submitted answers for each question
            $request->validate([
                'questions' => 'required|array|size:10', // Ensure all questions are answered
                'questions.*' => 'required|integer|exists:answers,id', // Ensure each selected answer is valid
            ]);
    
            // Initialize variables for results
            $correctAnswersCount = 0;
            $totalXP = 0;
            $questionsData = [];
    
            foreach ($request->input('questions') as $questionId => $selectedAnswerId) {
                $question = Question::with('answers')->find($questionId);
                $correctAnswers = $question->answers()->where('is_correct', true)->pluck('id')->toArray();
    
                // Check if the selected answer is correct
                $isCorrect = in_array($selectedAnswerId, $correctAnswers);
    
                // Store question data for display
                $questionsData[$questionId] = [
                    'question' => $question->text,
                    'user_answer' => $selectedAnswerId,
                    'correct_answers' => $correctAnswers,
                    'answers' => $question->answers,
                    'is_correct' => $isCorrect,
                ];
    
                // If correct, increase count and XP
                if ($isCorrect) {
                    $correctAnswersCount++;
                    $totalXP += $question->xp_value; // Ensure xp_value is a property of the Question model
                }
            }
    
            // Store quiz results in the database
            Quiz::create([
                'user_id' => auth()->id(),
                'total_questions' => count($request->input('questions')),
                'correct_answers' => $correctAnswersCount,
                'xp_awarded' => $totalXP,
            ]);
    
            // Update user's XP
            $user = auth()->user();
            $user->xp += $totalXP;
            $user->save();
    
            // Set session variables for quiz results
            session()->put('correct_answers', $correctAnswersCount);
            session()->put('total_questions', count($request->input('questions')));
            session()->put('total_xp', $totalXP);
            session()->put('questions_data', $questionsData); // Store questions data in session
    
            return redirect()->route('quiz.results')->with('success', 'Your quiz has been submitted successfully!');
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function results(Request $request)
    {
        // Fetch the quiz from the database
        $quiz = Quiz::where('id', $request->quiz)->first();

        // Ensure quiz exists
        if (!$quiz) {
            return redirect()->route('quiz.index')->with('error', 'Quiz not found.');
        }

        // Ensure all questions have been answered
        $questions = $request->session()->get('quiz_questions'); // Retrieve the questions from session
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
        $xp = 0; // Initialize XP variable

        // Determine which answers are correct
        foreach ($answers as $key => $value) {
            if (is_numeric($key)) {
                $correct_answer = Answer::where('question_id', $key)->where('is_correct', 1)->first();
                if ($correct_answer && $correct_answer->text == $value) { // Check if correct answer exists
                    $question = Question::find($key);
                    $results['overall']++;

                    // Increment the category score
                    $results[strtolower($question->category)]++;
                }
            }
        }

        // Add XP to user
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

        // Redirect to results page with the results
        return view('questions.results', ['results' => $results, 'quiz' => $quiz]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
