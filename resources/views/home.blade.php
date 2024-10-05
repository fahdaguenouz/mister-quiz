@extends('app')

@section('content')
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
