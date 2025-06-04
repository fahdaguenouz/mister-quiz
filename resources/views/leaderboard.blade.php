@extends('app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap');
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --neon-blue: #00d4ff;
        --neon-purple: #b347d9;
        --neon-pink: #ff0080;
        --neon-green: #00ff41;
        --neon-gold: #ffd700;
        --neon-silver: #c0c0c0;
        --neon-bronze: #cd7f32;
        --cyber-dark: #0a0a0a;
        --cyber-darker: #050505;
        --glass: rgba(255, 255, 255, 0.03);
        --glass-border: rgba(255, 255, 255, 0.1);
        --text-primary: #ffffff;
        --text-secondary: rgba(255, 255, 255, 0.7);
    }

    body {
        font-family: 'Space Grotesk', sans-serif;
        min-height: 100vh;
        background: var(--cyber-darker);
        overflow-x: hidden;
        position: relative;
        margin: 0;
        padding: 0;
        color: var(--text-primary);
    }

    /* Animated Cyber Grid Background */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -3;
        background: 
            linear-gradient(90deg, transparent 98%, rgba(0, 212, 255, 0.1) 100%),
            linear-gradient(0deg, transparent 98%, rgba(179, 71, 217, 0.1) 100%);
        background-size: 50px 50px;
        animation: gridMove 20s linear infinite;
    }

    @keyframes gridMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    /* Dynamic Energy Waves */
    body::after {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -2;
        background: 
            radial-gradient(circle at 20% 80%, rgba(0, 212, 255, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(179, 71, 217, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 40% 40%, rgba(255, 0, 128, 0.1) 0%, transparent 50%);
        animation: energyPulse 8s ease-in-out infinite;
    }

    @keyframes energyPulse {
        0%, 100% { 
            transform: scale(1) rotate(0deg);
            opacity: 0.6;
        }
        33% { 
            transform: scale(1.1) rotate(120deg);
            opacity: 0.8;
        }
        66% { 
            transform: scale(0.9) rotate(240deg);
            opacity: 0.4;
        }
    }

    /* Navigation Styles */
    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem 3rem;
        background: var(--glass);
        backdrop-filter: blur(30px);
        border-bottom: 1px solid var(--glass-border);
        position: relative;
        z-index: 100;
    }

    nav::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, 
            transparent, 
            var(--neon-blue), 
            var(--neon-purple), 
            var(--neon-pink), 
            transparent
        );
        animation: navGlow 3s linear infinite;
    }

    @keyframes navGlow {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    .btn {
        padding: 0.8rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        background: var(--glass);
        color: var(--text-primary);
        border: 1px solid var(--glass-border);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: 'Space Grotesk', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        backdrop-filter: blur(15px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        position: relative;
        overflow: hidden;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(255, 255, 255, 0.2), 
            transparent
        );
        transition: left 0.6s ease;
    }

    .btn:hover::before {
        left: 100%;
    }

    .btn:hover {
        background: rgba(0, 212, 255, 0.1);
        border-color: var(--neon-blue);
        transform: translateY(-3px) scale(1.05);
        box-shadow: 
            0 15px 40px rgba(0, 0, 0, 0.4),
            0 0 30px rgba(0, 212, 255, 0.3);
        color: var(--text-primary);
        text-decoration: none;
    }

    /* Leaderboard Container */
    .leaderboard-container {
        max-width: 1200px;
        margin: 3rem auto;
        padding: 3rem;
        background: var(--glass);
        backdrop-filter: blur(30px);
        border: 1px solid var(--glass-border);
        border-radius: 30px;
        position: relative;
        overflow: hidden;
        animation: containerAppear 1s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 
            0 25px 80px rgba(0, 0, 0, 0.8),
            inset 0 1px 0 rgba(255, 255, 255, 0.1),
            0 0 100px rgba(0, 212, 255, 0.1);
    }

    @keyframes containerAppear {
        from {
            opacity: 0;
            transform: translateY(100px) scale(0.8);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Holographic Border Effect */
    .leaderboard-container::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(45deg, 
            var(--neon-blue), 
            var(--neon-purple), 
            var(--neon-pink), 
            var(--neon-green),
            var(--neon-blue)
        );
        border-radius: 32px;
        z-index: -1;
        animation: holoBorder 6s linear infinite;
        opacity: 0.4;
    }

    @keyframes holoBorder {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Floating Orbs */
    .leaderboard-container::after {
        content: '';
        position: absolute;
        top: -100px;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, var(--neon-gold) 0%, transparent 70%);
        border-radius: 50%;
        animation: trophyOrb 4s ease-in-out infinite;
        box-shadow: 
            0 0 100px var(--neon-gold),
            inset 0 0 100px rgba(255, 215, 0, 0.3);
        opacity: 0.6;
    }

    @keyframes trophyOrb {
        0%, 100% { 
            transform: translateX(-50%) translateY(0) scale(1);
            box-shadow: 0 0 100px var(--neon-gold);
        }
        50% { 
            transform: translateX(-50%) translateY(-20px) scale(1.1);
            box-shadow: 0 0 150px var(--neon-gold);
        }
    }

    /* Leaderboard Title */
    .leaderboard-title {
        font-family: 'Orbitron', monospace;
        font-size: 4rem;
        font-weight: 900;
        text-align: center;
        margin-bottom: 3rem;
        margin-top: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1.5rem;
        background: linear-gradient(135deg, 
            var(--neon-gold) 0%, 
            var(--neon-blue) 50%, 
            var(--neon-purple) 100%
        );
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: titlePulse 3s ease-in-out infinite;
        text-transform: uppercase;
        letter-spacing: 6px;
        position: relative;
    }

    @keyframes titlePulse {
        0%, 100% { 
            filter: drop-shadow(0 0 30px rgba(255, 215, 0, 0.6));
            transform: scale(1);
        }
        50% { 
            filter: drop-shadow(0 0 60px rgba(0, 212, 255, 0.8));
            transform: scale(1.02);
        }
    }

    .leaderboard-title i {
        color: var(--neon-gold);
        font-size: 4.5rem;
        animation: trophyFloat 2s ease-in-out infinite;
        filter: drop-shadow(0 0 20px currentColor);
    }

    @keyframes trophyFloat {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(5deg); }
    }

    /* Leaderboard Table */
    .leaderboard-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 1rem;
        margin-top: 2rem;
    }

    .leaderboard-table thead {
        position: relative;
    }

    .leaderboard-table thead th {
        background: linear-gradient(135deg, var(--neon-blue), var(--neon-purple));
        color: var(--text-primary);
        padding: 2rem 1.5rem;
        text-align: left;
        font-weight: 700;
        font-family: 'Orbitron', monospace;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 1rem;
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 
            0 8px 25px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .leaderboard-table thead th:first-child {
        border-radius: 20px 0 0 20px;
    }

    .leaderboard-table thead th:last-child {
        border-radius: 0 20px 20px 0;
    }

    .leaderboard-table tbody tr {
        background: var(--glass);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .leaderboard-table tbody tr:hover {
        background: rgba(0, 212, 255, 0.1);
        border-color: var(--neon-blue);
        box-shadow: 
            0 20px 50px rgba(0, 0, 0, 0.5),
            0 0 50px rgba(0, 212, 255, 0.3);
    }

    .leaderboard-table td {
        padding: 2rem 1.5rem;
        font-size: 1.2rem;
        font-weight: 500;
        color: var(--text-primary);
        position: relative;
    }

    .leaderboard-table td:first-child {
        border-radius: 20px 0 0 20px;
    }

    .leaderboard-table td:last-child {
        border-radius: 0 20px 20px 0;
    }

    /* Rank Styling with Special Effects */
    .leaderboard-table tbody tr:nth-child(1) td:first-child {
        color: var(--neon-gold);
        font-weight: 900;
        font-size: 1.5rem;
        font-family: 'Orbitron', monospace;
        text-shadow: 
            0 0 20px currentColor,
            0 0 40px currentColor;
        animation: goldPulse 2s ease-in-out infinite;
    }

    @keyframes goldPulse {
        0%, 100% { 
            transform: scale(1);
            text-shadow: 0 0 20px currentColor;
        }
        50% { 
            transform: scale(1.1);
            text-shadow: 0 0 40px currentColor, 0 0 60px currentColor;
        }
    }

    .leaderboard-table tbody tr:nth-child(2) td:first-child {
        color: var(--neon-silver);
        font-weight: 800;
        font-size: 1.3rem;
        font-family: 'Orbitron', monospace;
        text-shadow: 0 0 15px currentColor;
        animation: silverGlow 3s ease-in-out infinite;
    }

    @keyframes silverGlow {
        0%, 100% { text-shadow: 0 0 15px currentColor; }
        50% { text-shadow: 0 0 30px currentColor; }
    }

    .leaderboard-table tbody tr:nth-child(3) td:first-child {
        color: var(--neon-bronze);
        font-weight: 800;
        font-size: 1.2rem;
        font-family: 'Orbitron', monospace;
        text-shadow: 0 0 15px currentColor;
        animation: bronzeGlow 4s ease-in-out infinite;
    }

    @keyframes bronzeGlow {
        0%, 100% { text-shadow: 0 0 15px currentColor; }
        50% { text-shadow: 0 0 25px currentColor; }
    }

    /* Username Styling */
    .leaderboard-table tbody tr:nth-child(1) td:nth-child(2) {
        font-weight: 700;
        color: var(--neon-gold);
        text-shadow: 0 0 10px currentColor;
    }

    .leaderboard-table tbody tr:nth-child(2) td:nth-child(2) {
        font-weight: 600;
        color: var(--neon-silver);
        text-shadow: 0 0 8px currentColor;
    }

    .leaderboard-table tbody tr:nth-child(3) td:nth-child(2) {
        font-weight: 600;
        color: var(--neon-bronze);
        text-shadow: 0 0 8px currentColor;
    }

    /* XP and Score Styling */
    .leaderboard-table td:nth-child(3),
    .leaderboard-table td:nth-child(4) {
        font-family: 'Orbitron', monospace;
        font-weight: 600;
        background: linear-gradient(135deg, var(--neon-blue), var(--neon-purple));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Empty State */
    .leaderboard-table tbody tr td[colspan="4"] {
        text-align: center;
        padding: 4rem 2rem;
        font-size: 1.5rem;
        color: var(--text-secondary);
        font-family: 'Orbitron', monospace;
        background: var(--glass);
        border-radius: 20px;
        backdrop-filter: blur(20px);
    }

    /* Quiz Button */
    .leaderboard-container > div[style*="margin-top"] {
        margin-top: 4rem !important;
        text-align: center;
    }

    .leaderboard-container .btn {
        padding: 1.5rem 3rem;
        font-size: 1.3rem;
        font-weight: 700;
        font-family: 'Orbitron', monospace;
        background: linear-gradient(135deg, var(--neon-green), var(--neon-blue));
        border: none;
        text-transform: uppercase;
        letter-spacing: 3px;
        box-shadow: 
            0 15px 40px rgba(0, 255, 65, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .leaderboard-container .btn::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
        transition: all 0.6s ease;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }

    .leaderboard-container .btn:hover::after {
        width: 300px;
        height: 300px;
    }

    .leaderboard-container .btn:hover {
        background: linear-gradient(135deg, #00ff65, #00e5ff);
        transform: translateY(-8px) scale(1.05);
        box-shadow: 
            0 25px 60px rgba(0, 255, 65, 0.5),
            0 0 50px rgba(0, 212, 255, 0.4);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .leaderboard-container {
            margin: 2rem;
            padding: 2rem;
        }
        
        .leaderboard-title {
            font-size: 3rem;
            letter-spacing: 4px;
        }
        
        .leaderboard-title i {
            font-size: 3.5rem;
        }
    }

    @media (max-width: 768px) {
        nav {
            padding: 1rem 1.5rem;
            flex-direction: column;
            gap: 1rem;
        }
        
        .leaderboard-container {
            margin: 1rem;
            padding: 1.5rem;
        }
        
        .leaderboard-title {
            font-size: 2.5rem;
            letter-spacing: 2px;
            flex-direction: column;
            gap: 1rem;
        }
        
        .leaderboard-title i {
            font-size: 3rem;
        }
        
        .leaderboard-table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
        
        .leaderboard-table thead,
        .leaderboard-table tbody,
        .leaderboard-table th,
        .leaderboard-table td,
        .leaderboard-table tr {
            display: block;
        }
        
        .leaderboard-table thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        
        .leaderboard-table tbody tr {
            margin-bottom: 1rem;
            padding: 1.5rem;
            border-radius: 20px;
            display: block;
            white-space: normal;
        }
        
        .leaderboard-table td {
            border: none;
            position: relative;
            padding: 0.5rem 0;
            padding-left: 50%;
            text-align: left;
            white-space: normal;
        }
        
        .leaderboard-table td:before {
            content: attr(data-label) ": ";
            position: absolute;
            left: 0;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            font-weight: 600;
            color: var(--neon-blue);
            font-family: 'Orbitron', monospace;
            text-transform: uppercase;
            font-size: 0.9rem;
        }
        
        .btn {
            padding: 1rem 1.5rem;
            font-size: 0.9rem;
        }
    }

    /* Particle Effects */
    @keyframes particle1 {
        0% { 
            transform: translateY(100vh) translateX(0) scale(0);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% { 
            transform: translateY(-100px) translateX(100px) scale(1);
            opacity: 0;
        }
    }

    @keyframes particle2 {
        0% { 
            transform: translateY(100vh) translateX(0) scale(0) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% { 
            transform: translateY(-100px) translateX(-100px) scale(1) rotate(360deg);
            opacity: 0;
        }
    }

    .leaderboard-container {
        position: relative;
        overflow: visible;
    }

    .leaderboard-container::before {
        /* Keep existing holographic border */
    }

    /* Add floating particles */
    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: var(--neon-blue);
        border-radius: 50%;
        pointer-events: none;
        z-index: -1;
    }

    .particle:nth-child(odd) {
        animation: particle1 8s linear infinite;
        animation-delay: calc(var(--delay) * 1s);
        background: var(--neon-purple);
        box-shadow: 0 0 10px currentColor;
    }

    .particle:nth-child(even) {
        animation: particle2 10s linear infinite;
        animation-delay: calc(var(--delay) * 1s);
        background: var(--neon-pink);
        box-shadow: 0 0 8px currentColor;
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
