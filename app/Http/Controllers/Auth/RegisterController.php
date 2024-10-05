<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
{
    // Validate the request
    $this->validate($request, [
        'username' => 'required|max:255|unique:users',  // Ensure username is unique
        'email' => 'required|email|max:255|unique:users',  // Ensure email is unique
        'password' => 'required|string|min:8|confirmed',  // Password must match confirmation
    ]);

    // Create and store the user with default values
    $user = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),  // Hash the password
        'xp' => 0,  // Starting XP
        'rank' => 'Quiz Apprentice',  // Default rank for new users based on initial XP
        'total_correct_answers' => 0,  // No correct answers at start
        'total_questions_answered' => 0,  // No questions answered at start
        'percentage_correct' => 0,  // No percentage data at start
    ]);

    // Automatically log in the user after registration
    Auth::login($user);

    return redirect()->route('profile');
}
}
