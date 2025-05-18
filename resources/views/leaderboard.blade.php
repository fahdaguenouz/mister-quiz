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
    
    .leaderboard-container {
        max-width: 1000px;
        margin: 2rem auto;
        padding: 2rem;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
    }
    
    .leaderboard-title {
        font-size: 2.5rem;
        color: var(--primary);
        text-align: center;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }
    
    .leaderboard-title i {
        color: #FFD700;
    }
    
    .leaderboard-table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        border-radius: 8px;
        overflow: hidden;
    }
    
    .leaderboard-table thead {
        background-color: var(--primary);
        color: white;
    }
    
    .leaderboard-table th {
        padding: 1.2rem 1rem;
        text-align: left;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        font-size: 0.9rem;
    }
    
    .leaderboard-table td {
        padding: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        font-size: 1rem;
    }
    
    .leaderboard-table tbody tr {
        transition: background-color 0.3s ease;
    }
    
    .leaderboard-table tbody tr:hover {
        background-color: rgba(108, 99, 255, 0.05);
    }
    
    .leaderboard-table tbody tr:nth-child(1) td:first-child {
        color: #FFD700;
        font-weight: 700;
        font-size: 1.1rem;
    }
    
    .leaderboard-table tbody tr:nth-child(2) td:first-child {
        color: #C0C0C0;
        font-weight: 700;
    }
    
    .leaderboard-table tbody tr:nth-child(3) td:first-child {
        color: #CD7F32;
        font-weight: 700;
    }
    
    .home-link {
        display: block;
        text-align: center;
        margin-top: 2rem;
    }
    
    /* Responsive styles */
    @media (max-width: 768px) {
        .leaderboard-container {
            padding: 1.5rem;
            margin: 1.5rem;
        }
        
        .leaderboard-title {
            font-size: 2rem;
        }
        
        .leaderboard-table {
            overflow-x: auto;
            display: block;
        }
        
        .leaderboard-table th,
        .leaderboard-table td {
            padding: 0.8rem;
            font-size: 0.9rem;
        }
    }
</style>

<nav>
    <a class="btn" href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>

    <div style="display: flex; gap: 30px">
        @auth
            <a class="btn" href="{{ route('profile') }}"><i class="fas fa-user"></i> {{ auth()->user()->username }}</a>
        @endauth

        @guest
            <a class="btn" href="{{ route('login') }}"><i class="fas fa-right-to-bracket"></i> Login</a>
        @endguest

        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn"><i class="fas fa-right-from-bracket"></i> Logout</button>
            </form>
        @endauth
    </div>
</nav>

<div class="leaderboard-container">
    <h1 class="leaderboard-title"><i class="fas fa-trophy"></i> Leaderboard</h1>

    <table class="leaderboard-table">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th>XP</th>
                <th>Total Correct Answers</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($topPlayers as $index => $player)
                <tr>
                    <td>#{{ $index + 1 }}</td>
                    <td>{{ $player->username }}</td>
                    <td>{{ $player->xp }}</td>
                    <td>{{ $player->total_correct }}</td>
                </tr>
            @endforeach
            
            @if(count($topPlayers) == 0)
                <tr>
                    <td colspan="4" style="text-align: center; padding: 2rem;">No players found</td>
                </tr>
            @endif
        </tbody>
    </table>

    @auth
        <div style="margin-top: 3rem; text-align: center;">
            <a href="{{ route('quiz') }}" class="btn btn-primary">Take Quiz <i class="fas fa-play"></i></a>
        </div>
    @endauth
</div>
@endsection