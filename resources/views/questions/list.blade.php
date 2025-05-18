@extends('app')

@section('content')

<style>
    .quiz-container {
        max-width: 900px;
        margin: 2rem auto;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        padding: 2rem;
        font-family: 'Poppins', sans-serif;
    }
    .quiz-title {
        text-align: center;
        color: var(--primary);
        font-weight: 800;
        font-size: 2.2rem;
        margin-bottom: 2rem;
    }
    .error {
        background-color: var(--danger);
        color: white;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-weight: 600;
        text-align: center;
    }
    .quiz-form {
        display: flex;
        flex-direction: column;
        gap: 1.8rem;
    }
    .btn {
        align-self: center;
        background-color: var(--primary);
        color: black;
        padding: 0.75rem 3rem;
        border:  solid 1px  black;
        border-radius: 50px;
        font-weight: 700;
       
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 1.1rem;
        margin-top: 1rem;
    }
    .btn:hover {
        background-color: var(--secondary);
    }
    .no-questions {
        text-align: center;
        font-size: 1.2rem;
        color: var(--dark);
        font-weight: 600;
    }
</style>

<div class="quiz-container">
    <h1 class="quiz-title">Take the Quiz</h1>

    @if (session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('quiz.submit') }}" method="post" class="quiz-form">
        @csrf

        @if (!empty($quiz['questions']))
            @foreach ($quiz['questions'] as $question)
                <x-question :question="$question" />
            @endforeach
        @else
            <p class="no-questions">No questions available.</p>
        @endif

        <button type="submit" class="btn">Submit</button>
    </form>
</div>

@endsection
