@extends('app')

@section('content')

<div class="container mx-auto p-8">
    <h1 class="text-2xl font-bold mb-4">Profile</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-2">{{ $user->username }}</h2>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>XP:</strong> {{ $user->xp }}</p>
        <p><strong>Rank:</strong> {{ $rank }}</p>

        <h3 class="text-lg font-semibold mt-4">Quiz Stats</h3>
        <p><strong>Correct Answers:</strong> {{ $user->total_correct_answers }}</p>
        <p><strong>Total Questions Answered:</strong> {{ $user->total_questions_answered }}</p>
        <p><strong>Percentage Correct:</strong> {{ $user->percentage_correct }}%</p>

        <!-- Add more fields as needed -->
    </div>
</div>

@endsection