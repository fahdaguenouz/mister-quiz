@extends('app')

@section('content')

@auth
<a class="absolute top-4 left-4 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200" href="{{ route('profile') }}">
    {{ auth()->user()->username }}
</a>
@endauth

@guest
<a class="absolute top-4 left-4 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200" href="{{ route('login') }}">
    Login
</a>
@endguest

<a class="absolute top-4 right-4 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200" href="{{ route('leaderboard') }}">
    Leaderboard
</a>

@auth
<a class="absolute bottom-4 right-4 bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-200" href="{{ route('logout') }}">
    Logout
</a>
@endauth

<div class="flex flex-col items-center justify-center min-h-screen">
    <div class="main-img mb-8">
        <img src="{{ asset('images/mister_quiz.png') }}" alt="Mister Quiz" class="w-64 h-auto">
    </div>

    <p class="text-4xl font-bold mb-8">Mister Quiz</p>

    <a class="bg-green-500 text-white py-3 px-8 rounded-lg hover:bg-green-600 transition duration-200" href="{{ route('quiz') }}">
        Start Quiz
    </a>
</div>

@endsection
