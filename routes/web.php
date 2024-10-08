<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\Questions\QuestionController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    
    // Apply the auth middleware here
    Route::middleware(['auth'])->group(function () {
        Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
        Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
        Route::get('/quiz/results', [QuizController::class, 'results'])->name('quiz.results');
    });
});
