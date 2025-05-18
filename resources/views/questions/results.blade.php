@extends('app')

@section('content')

<style>
    .quiz-results-container {
        max-width: 900px;
        margin: 2rem auto;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        padding: 2.5rem 3rem;
        font-family: 'Poppins', sans-serif;
        color: var(--dark);
    }
    .result-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 2rem;
    }
    .result-header a {
        color: var(--primary);
        font-weight: 600;
        font-size: 1.1rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: color 0.3s ease;
    }
    .result-header a:hover {
        color: var(--secondary);
    }
    .score-section {
        text-align: center;
        margin-bottom: 2rem;
    }
    .score-section h2 {
        font-weight: 800;
        color: var(--primary);
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    .overall-score {
        font-size: 3rem;
        font-weight: 900;
        color: var(--dark);
        margin-bottom: 0.3rem;
    }
    .xp-earned {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--secondary);
    }
    .category-scores {
        margin-bottom: 2.5rem;
    }
    .category-scores h3 {
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: var(--primary);
        border-bottom: 2px solid var(--primary);
        padding-bottom: 0.3rem;
    }
    .categories {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .category {
        flex: 1 1 150px;
        background: #f9fafb;
        border-radius: 10px;
        padding: 1rem 1.2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        color: var(--dark);
        font-size: 1.1rem;
        transition: background-color 0.3s ease;
    }
    .category p:first-child {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        color: var(--primary);
    }
    .category:hover {
        background-color: var(--primary);
        color: white;
    }
    .category:hover p:first-child {
        color: white;
    }
    .actions {
        text-align: center;
    }
    .btn {
        background-color: var(--primary);
        color: white;
        padding: 0.75rem 2.5rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        transition: background-color 0.3s ease;
        cursor: pointer;
        border: none;
    }
    .btn:hover {
        background-color: var(--secondary);
        color: white;
    }
    /* FontAwesome icon sizing */
    .fa-solid {
        font-size: 1.2rem;
    }
</style>

<div class="quiz-results-container">

    <div class="result-header">
        <a href="{{ route('home') }}" class="home-link"><i class="fa-solid fa-house"></i> Home</a>
        <a href="{{ route('profile') }}" class="profile-link"><i class="fa-solid fa-user"></i> {{ auth()->user()->username }}</a>
    </div>

    <div class="score-section">
        <h2>Your Score</h2>
        <p class="overall-score">{{ $results['overall'] }} / 20</p>
        <p class="xp-earned">XP Earned: {{ $xp }}</p>
    </div>

    <div class="category-scores">
        <h3>Category Breakdown</h3>
        <div class="categories">
            <div class="category">
                <p><i class="fa-solid fa-palette"></i> Art</p>
                <p>{{ $results['art'] }} / 4</p>
            </div>
            <div class="category">
                <p><i class="fa-solid fa-book-atlas"></i> Geography</p>
                <p>{{ $results['geography'] }} / 4</p>
            </div>
            <div class="category">
                <p><i class="fa-solid fa-book"></i> History</p>
                <p>{{ $results['history'] }} / 4</p>
            </div>
            <div class="category">
                <p><i class="fa-solid fa-microscope"></i> Science</p>
                <p>{{ $results['science'] }} / 4</p>
            </div>
            <div class="category">
                <p><i class="fa-solid fa-futbol"></i> Sports</p>
                <p>{{ $results['sports'] }} / 4</p>
            </div>
        </div>
    </div>

    <div class="actions">
        <a href="{{ route('quiz') }}" class="btn">Try Again <i class="fa-solid fa-rotate-right"></i></a>
    </div>

</div>

@endsection
