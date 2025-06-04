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

    .btn-nav {
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

    .btn-nav::before {
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

    .btn-nav:hover::before {
        left: 100%;
    }

    .btn-nav:hover {
        background: rgba(0, 212, 255, 0.1);
        border-color: var(--neon-blue);
        transform: translateY(-3px) scale(1.05);
        box-shadow: 
            0 15px 40px rgba(0, 0, 0, 0.4),
            0 0 30px rgba(0, 212, 255, 0.3);
        color: var(--text-primary);
        text-decoration: none;
    }
    .quiz-results-container {
        max-width: 1000px;
        margin: 3rem auto;
        background: var(--glass);
        backdrop-filter: blur(30px);
        border: 1px solid var(--glass-border);
        border-radius: 30px;
        box-shadow: 
            0 25px 80px rgba(0, 0, 0, 0.8),
            inset 0 1px 0 rgba(255, 255, 255, 0.1),
            0 0 100px rgba(0, 212, 255, 0.1);
        padding: 3rem;
        font-family: 'Space Grotesk', sans-serif;
        color: var(--text-primary);
        position: relative;
        overflow: hidden;
        animation: containerAppear 1s cubic-bezier(0.4, 0, 0.2, 1);
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
    .quiz-results-container::before {
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

    /* Floating Achievement Orb */
    .quiz-results-container::after {
        content: '';
        position: absolute;
        top: -80px;
        left: 50%;
        transform: translateX(-50%);
        width: 160px;
        height: 160px;
        background: radial-gradient(circle, var(--neon-gold) 0%, transparent 70%);
        border-radius: 50%;
        animation: achievementOrb 4s ease-in-out infinite;
        box-shadow: 
            0 0 80px var(--neon-gold),
            inset 0 0 80px rgba(255, 215, 0, 0.3);
        opacity: 0.7;
    }

    @keyframes achievementOrb {
        0%, 100% { 
            transform: translateX(-50%) translateY(0) scale(1);
            box-shadow: 0 0 80px var(--neon-gold);
        }
        50% { 
            transform: translateX(-50%) translateY(-15px) scale(1.1);
            box-shadow: 0 0 120px var(--neon-gold);
        }
    }

    .result-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 3rem;
        position: relative;
        z-index: 10;
    }

    .result-header a {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 1.1rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.8rem 2rem;
        border-radius: 50px;
        background: var(--glass);
        border: 1px solid var(--glass-border);
        backdrop-filter: blur(15px);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-transform: uppercase;
        letter-spacing: 1px;
        font-family: 'Space Grotesk', sans-serif;
        position: relative;
        overflow: hidden;
    }

    .result-header a::before {
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

    .result-header a:hover::before {
        left: 100%;
    }

    .result-header a:hover {
        background: rgba(0, 212, 255, 0.1);
        border-color: var(--neon-blue);
        transform: translateY(-3px) scale(1.05);
        box-shadow: 
            0 15px 40px rgba(0, 0, 0, 0.4),
            0 0 30px rgba(0, 212, 255, 0.3);
        color: var(--text-primary);
        text-decoration: none;
    }

    .score-section {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
        z-index: 10;
    }

    .score-section h2 {
        font-family: 'Orbitron', monospace;
        font-weight: 900;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, 
            var(--neon-gold) 0%, 
            var(--neon-blue) 50%, 
            var(--neon-purple) 100%
        );
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-transform: uppercase;
        letter-spacing: 4px;
        animation: titlePulse 3s ease-in-out infinite;
    }

    @keyframes titlePulse {
        0%, 100% { 
            filter: drop-shadow(0 0 20px rgba(255, 215, 0, 0.6));
            transform: scale(1);
        }
        50% { 
            filter: drop-shadow(0 0 40px rgba(0, 212, 255, 0.8));
            transform: scale(1.02);
        }
    }

    .overall-score {
        font-size: 4rem;
        font-weight: 900;
        font-family: 'Orbitron', monospace;
        color: var(--neon-gold);
        margin-bottom: 0.5rem;
        text-shadow: 
            0 0 30px currentColor,
            0 0 60px currentColor;
        animation: scoreGlow 2s ease-in-out infinite;
    }

    @keyframes scoreGlow {
        0%, 100% { 
            transform: scale(1);
            text-shadow: 0 0 30px currentColor;
        }
        50% { 
            transform: scale(1.05);
            text-shadow: 0 0 60px currentColor, 0 0 90px currentColor;
        }
    }

    .xp-earned {
        font-size: 1.4rem;
        font-weight: 700;
        font-family: 'Orbitron', monospace;
        background: linear-gradient(135deg, var(--neon-green), var(--neon-blue));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .category-scores {
        margin-bottom: 3rem;
        position: relative;
        z-index: 10;
    }

    .category-scores h3 {
        font-family: 'Orbitron', monospace;
        font-weight: 800;
        font-size: 2rem;
        margin-bottom: 2rem;
        text-align: center;
        background: linear-gradient(135deg, 
            var(--neon-blue) 0%, 
            var(--neon-purple) 100%
        );
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-transform: uppercase;
        letter-spacing: 3px;
        position: relative;
    }

    .category-scores h3::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 2px;
        background: linear-gradient(90deg, var(--neon-blue), var(--neon-purple));
        box-shadow: 0 0 10px currentColor;
    }

    .categories {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
    }

    .category {
        background: var(--glass);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        color: var(--text-primary);
        font-size: 1.1rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    }

    .category::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(255, 255, 255, 0.1), 
            transparent
        );
        transition: left 0.6s ease;
    }

    .category:hover::before {
        left: 100%;
    }

    .category:hover {
        background: rgba(0, 212, 255, 0.1);
        border-color: var(--neon-blue);
        transform: translateY(-8px) scale(1.05);
        box-shadow: 
            0 20px 50px rgba(0, 0, 0, 0.5),
            0 0 50px rgba(0, 212, 255, 0.3);
    }

    .category p:first-child {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        color: var(--neon-blue);
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .category p:last-child {
        font-family: 'Orbitron', monospace;
        font-weight: 700;
        font-size: 1.2rem;
        background: linear-gradient(135deg, var(--neon-gold), var(--neon-green));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .category:hover p:first-child {
        color: var(--text-primary);
        text-shadow: 0 0 10px var(--neon-blue);
    }

    .actions {
        text-align: center;
        position: relative;
        z-index: 10;
    }

    .btn {
        background: linear-gradient(135deg, var(--neon-green), var(--neon-blue));
        color: var(--text-primary);
        padding: 1.2rem 3rem;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.2rem;
        font-family: 'Orbitron', monospace;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        border: none;
        text-transform: uppercase;
        letter-spacing: 2px;
        position: relative;
        overflow: hidden;
        box-shadow: 
            0 15px 40px rgba(0, 255, 65, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .btn::after {
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

    .btn:hover::after {
        width: 300px;
        height: 300px;
    }

    .btn:hover {
        background: linear-gradient(135deg, #00ff65, #00e5ff);
        transform: translateY(-8px) scale(1.05);
        box-shadow: 
            0 25px 60px rgba(0, 255, 65, 0.5),
            0 0 50px rgba(0, 212, 255, 0.4);
        color: var(--text-primary);
        text-decoration: none;
    }

    /* FontAwesome icon styling */
    .fa-solid {
        font-size: 1.2rem;
        filter: drop-shadow(0 0 5px currentColor);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .quiz-results-container {
            margin: 1.5rem;
            padding: 2rem;
        }
        
        .result-header {
            flex-direction: column;
            gap: 1rem;
            align-items: center;
        }
        
        .score-section h2 {
            font-size: 2rem;
            letter-spacing: 2px;
        }
        
        .overall-score {
            font-size: 3rem;
        }
        
        .categories {
            grid-template-columns: 1fr;
        }
        
        .category {
            padding: 1.2rem;
        }
        
        .btn {
            padding: 1rem 2rem;
            font-size: 1rem;
        }
    }
</style>
<nav>
    <a class="btn-nav" href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>

    <div style="display: flex; gap: 30px">
        <a class="btn-nav" href="{{ route('leaderboard') }}"><i class="fas fa-trophy"></i> Leaderboard</a>

        @auth
            <a class="btn-nav" href="{{ route('profile') }}"><i class="fas fa-user"></i> {{ auth()->user()->username }}</a>
        @endauth

        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn-nav"><i class="fas fa-right-from-bracket"></i> Logout</button>
            </form>
        @endauth
    </div>
</nav>
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
