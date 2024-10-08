<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {

        $user = Auth()->user();

        //variables that will be used to display user score in each category
        $art = [];
        $geography = [];
        $history = [];
        $science = [];
        $sports = [];

        return view('profile', ['art' => $art, 'geography' => $geography, 'history' => $history, 'science' => $science, 'sports' => $sports]);
    }
    public function show()
    {
        $user = Auth::user();  // Fetch the logged-in user's data

        // Calculate the user's rank based on XP
        if ($user->xp >= 10000) {
            $rank = 'Quiz Master';
        } elseif ($user->xp >= 5000) {
            $rank = 'Epic Quizer';
        } elseif ($user->xp >= 1500) {
            $rank = 'Average Quizer';
        } else {
            $rank = 'Quiz Apprentice';
        }

        return view('profile', [
            'user' => $user,
            'rank' => $rank
        ]);
    }
    public function showProfile()
{
    $user = auth()->user();
    $rank = $user->rank; // Assuming rank is computed dynamically in the User model

    return view('profile', compact('user', 'rank'));
}
}
