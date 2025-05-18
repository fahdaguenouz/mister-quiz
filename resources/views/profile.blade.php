@extends('app')

@section('content')
<style>
    :root {
        --primary: #6c63ff;
        --secondary: #ff6584;
        --dark: #2d3748;
        --light: #f7fafc;
        --success: #48bb78;
        --warning: #ed8936;
        --danger: #e53e3e;
    }
    
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f7fa;
        color: var(--dark);
        margin: 0;
        padding: 0;
    }
    
    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .btn {
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
        background-color: var(--primary);
        color: white;
        border: 2px solid var(--primary);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn:hover {
        background-color: transparent;
        color: var(--primary);
    }
    
    .profile-container {
        max-width: 1000px;
        margin: 2rem auto;
        padding: 0;
    }
    
    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 1.5rem;
        transition: transform 0.2s ease;
    }
    
    .back-link:hover {
        transform: translateX(-5px);
    }
    
    .profile-header {
        background-color: white;
        padding: 2.5rem;
        border-radius: 12px 12px 0 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .profile-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
    }
    
    .profile-name {
        font-size: 2.5rem;
        margin: 0 0 0.5rem 0;
        color: var(--dark);
    }
    
    .profile-email {
        color: #718096;
        margin: 0;
        font-size: 1.1rem;
    }
    
    .profile-xp-section {
        background: linear-gradient(135deg, var(--primary), #8177ff);
        color: white;
        padding: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 12px rgba(108, 99, 255, 0.2);
    }
    
    .profile-xp {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
    }
    
    .profile-rank {
        background-color: rgba(255, 255, 255, 0.2);
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        margin: 0;
    }
    
    .profile-rank span {
        font-size: 1.2rem;
    }
    
    .profile-stats {
        padding: 2.5rem;
        background-color: white;
        border-radius: 0 0 12px 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }
    
    .profile-stats h2 {
        margin-top: 0;
        margin-bottom: 1.5rem;
        color: var(--dark);
        font-size: 1.8rem;
        position: relative;
        padding-bottom: 0.75rem;
    }
    
    .profile-stats h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background-color: var(--primary);
    }
    
    .stats-table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        border-radius: 8px;
        overflow: hidden;
    }
    
    .stats-table thead {
        background-color: rgba(108, 99, 255, 0.1);
    }
    
    .stats-table th {
        padding: 1.2rem 1rem;
        text-align: left;
        font-weight: 600;
        color: var(--primary);
        font-size: 0.95rem;
    }
    
    .stats-table td {
        padding: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .stats-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .stats-table tbody tr {
        transition: background-color 0.3s ease;
    }
    
    .stats-table tbody tr:hover {
        background-color: rgba(108, 99, 255, 0.05);
    }
    
    .quiz-btn {
        display: block;
        width: fit-content;
        margin: 2.5rem auto 0;
        padding: 0.75rem 2rem;
    }
    
    /* Responsive styles */
    @media (max-width: 768px) {
        .profile-container {
            margin: 1.5rem;
        }
        
        .profile-header {
            padding: 2rem 1.5rem;
        }
        
        .profile-name {
            font-size: 2rem;
        }
        
        .profile-xp-section {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .profile-stats {
            padding: 1.5rem;
        }
        
        .stats-table {
            display: block;
            overflow-x: auto;
        }
        
        .stats-table th,
        .stats-table td {
            padding: 0.8rem;
            font-size: 0.9rem;
        }
    }
</style>

<nav>
    <a class="btn" href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>

    <div style="display: flex; gap: 30px">
        <a class="btn" href="{{ route('leaderboard') }}"><i class="fas fa-trophy"></i> Leaderboard</a>
        
        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn"><i class="fas fa-right-from-bracket"></i> Logout</button>
            </form>
        @endauth
    </div>
</nav>

<div class="profile-container">
    <a href="{{ route('home') }}" class="back-link"><i class="fas fa-arrow-left"></i> Back to Home</a>

    <div class="profile-header">
        <h1 class="profile-name">{{ auth()->user()->username }}</h1>
        <p class="profile-email">{{ auth()->user()->email }}</p>
    </div>

    <div class="profile-xp-section">
        <p class="profile-xp">{{ auth()->user()->xp }} XP</p>
        <p class="profile-rank">Rank: <span>{{ $rank }}</span></p>
    </div>

    <div class="profile-stats">
        <h2>Quiz Performance</h2>
        <table class="stats-table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Correct Answers</th>
                    <th>Total Questions</th>
                    <th>Accuracy</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoryData as $category => $data)
                    <tr>
                        <td>{{ ucfirst($category) }}</td>
                        <td>{{ $data['correct'] }}</td>
                        <td>{{ $data['total'] }}</td>
                        <td>{{ $data['percentage'] }}%</td>
                    </tr>
                @endforeach
                
                @if(count($categoryData) === 0)
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 2rem;">No quiz data available</td>
                    </tr>
                @endif
            </tbody>
        </table>
        
        <a href="{{ route('quiz') }}" class="btn quiz-btn">Take New Quiz <i class="fas fa-play"></i></a>
    </div>
</div>
@endsection