<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index()
    {
        // Fetch the top 10 users ordered by XP, including the sum of correct answers from quizzes
        $users = User::with('quizzes') // Eager load the quizzes
                     ->select('id', 'username', 'xp')
                     ->withCount(['quizzes as total_correct_answers' => function ($query) {
                         $query->select(DB::raw('COALESCE(SUM(correct_answers), 0)'));
                     }])
                     ->orderBy('xp', 'desc')
                     ->take(10)
                     ->get();

        return view('leaderboard', compact('users'));
    }
}
