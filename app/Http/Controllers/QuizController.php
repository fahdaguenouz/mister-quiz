<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question; // Ensure this is included
use App\Models\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Define the categories you want to include
        $categories = ['Art', 'History', 'Geography', 'Science', 'Sports'];
        $questions = [];

        // Fetch 4 random questions from each category
        foreach ($categories as $cat) {
            $query_questions = Question::with(['answers', 'category'])
                ->whereHas('category', function($query) use ($cat) {
                    $query->where('name', $cat); // Filter by category name
                })
                ->inRandomOrder()
                ->limit(4)
                ->get();

            // Add fetched questions to the main questions array
            foreach ($query_questions as $qq) {
                $questions[] = $qq;
            }
        }

        // Shuffle questions to randomize the order
        shuffle($questions);
        
        // Take only the first 10 questions if there are more than 10
        $questions = array_slice($questions, 0, 10);

        return view('quiz', compact('questions'));
    }

    public function submit(Request $request)
    {
        // Validate that the user submitted answers for each question
        $request->validate([
            'questions' => 'required|array|size:10', // Ensure all questions are answered and there are exactly 10 questions
            'questions.*' => 'required|array', // Each question must have answers
            'questions.*.*' => 'integer|exists:answers,id', // Ensure answers are valid
        ]);
    
        // Initialize variables for results
        $correctAnswersCount = 0;
        $totalXP = 0; // Initialize total XP awarded
        $questionsData = [];// Array to hold questions with user answers and correctness
    
        foreach ($request->input('questions') as $questionId => $selectedAnswers) {
            $question = Question::with('answers')->find($questionId);
            $correctAnswers = $question->answers()->where('is_correct', true)->pluck('id')->toArray();
    
            // Store question data for display
            $questionsData[$questionId] = [
                'question' => $question->text,
                'user_answers' => $selectedAnswers,
                'correct_answers' => $correctAnswers,
                'answers' => $question->answers,
                'is_correct' => count(array_intersect($selectedAnswers, $correctAnswers)) > 0,
            ];
    
            // Count how many selected answers are correct
            $correctAnswersCount += count(array_intersect($selectedAnswers, $correctAnswers));
    
            // If the question is answered correctly, add the XP value to the total
            if (count(array_intersect($selectedAnswers, $correctAnswers)) > 0) {
                $totalXP += $question->xp_value; // Add the XP value for the correctly answered question
            }
        }
    
        // Store quiz results in the database
        Quiz::create([
            'user_id' => auth()->id(),
            'total_questions' => count($request->input('questions')),
            'correct_answers' => $correctAnswersCount,
            'xp_awarded' => $totalXP, // Store the total XP awarded for this quiz
        ]);
    
        // Update user's XP
        $user = auth()->user();
        $user->xp += $totalXP;
        $user->save();
    
        // Set session variables for quiz results
        session()->flash('correct_answers', $correctAnswersCount);
        session()->flash('total_questions', count($request->input('questions')));
        session()->flash('total_xp', $totalXP);
        session(['questions_data' => $questionsData]); // Store questions data in session
    
        return redirect()->route('quiz.results')->with('success', 'Your quiz has been submitted successfully!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function results()
    {
        return view('results'); // Adjust this path based on where results.blade.php is located
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
