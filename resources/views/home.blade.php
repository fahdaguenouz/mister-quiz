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
        display: flex;
        flex-direction: column;
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

    /* Main Content Container */
    .main-img {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 1;
        text-align: center;
        padding: 4rem 2rem;
        position: relative;
        min-height: 80vh;
    }

    /* Floating Orbs Around Title */
    .main-img::before {
        content: '';
        position: absolute;
        top: 10%;
        left: 20%;
        width: 150px;
        height: 150px;
        background: radial-gradient(circle, var(--neon-blue) 0%, transparent 70%);
        border-radius: 50%;
        animation: orbFloat1 6s ease-in-out infinite;
        opacity: 0.4;
        z-index: -1;
    }

    .main-img::after {
        content: '';
        position: absolute;
        top: 20%;
        right: 15%;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, var(--neon-purple) 0%, transparent 70%);
        border-radius: 50%;
        animation: orbFloat2 8s ease-in-out infinite;
        opacity: 0.3;
        z-index: -1;
    }

    @keyframes orbFloat1 {
        0%, 100% { 
            transform: translateY(0) scale(1);
            opacity: 0.4;
        }
        33% { 
            transform: translateY(-30px) scale(1.1);
            opacity: 0.6;
        }
        66% { 
            transform: translateY(20px) scale(0.9);
            opacity: 0.3;
        }
    }

    @keyframes orbFloat2 {
        0%, 100% { 
            transform: translateY(0) translateX(0);
            opacity: 0.3;
        }
        50% { 
            transform: translateY(-40px) translateX(20px);
            opacity: 0.5;
        }
    }

    /* Main Title */
    .title {
        font-family: 'Orbitron', monospace;
        font-size: 6rem;
        font-weight: 900;
        margin-bottom: 2rem;
        background: linear-gradient(135deg, 
            var(--neon-gold) 0%, 
            var(--neon-blue) 30%, 
            var(--neon-purple) 60%,
            var(--neon-pink) 100%
        );
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: titleGlow 4s ease-in-out infinite;
        text-transform: uppercase;
        letter-spacing: 8px;
        position: relative;
        text-shadow: 0 0 80px rgba(255, 215, 0, 0.5);
    }

    @keyframes titleGlow {
        0%, 100% { 
            filter: drop-shadow(0 0 40px rgba(255, 215, 0, 0.6));
            transform: scale(1);
        }
        25% { 
            filter: drop-shadow(0 0 60px rgba(0, 212, 255, 0.8));
            transform: scale(1.02);
        }
        50% { 
            filter: drop-shadow(0 0 80px rgba(179, 71, 217, 0.7));
            transform: scale(1.03);
        }
        75% { 
            filter: drop-shadow(0 0 60px rgba(255, 0, 128, 0.8));
            transform: scale(1.01);
        }
    }

    /* Holographic effect for title */
    .title::before {
        content: 'MISTER QUIZ';
        position: absolute;
        top: 0;
        left: 0;
        background: linear-gradient(135deg, 
            transparent 0%, 
            rgba(0, 212, 255, 0.3) 25%, 
            transparent 50%,
            rgba(179, 71, 217, 0.3) 75%,
            transparent 100%
        );
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: holoScan 3s linear infinite;
        z-index: 1;
    }

    @keyframes holoScan {
        0% { transform: translateX(-100%); opacity: 0; }
        50% { opacity: 1; }
        100% { transform: translateX(100%); opacity: 0; }
    }

    /* Quiz Buttons */
    .quiz-btn {
        padding: 1.5rem 4rem;
        font-size: 1.4rem;
        font-weight: 700;
        font-family: 'Orbitron', monospace;
        background: linear-gradient(135deg, var(--neon-green), var(--neon-blue));
        border: 2px solid transparent;
        text-transform: uppercase;
        letter-spacing: 3px;
        box-shadow: 
            0 15px 40px rgba(0, 255, 65, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
        margin: 1rem;
        border-radius: 50px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .quiz-btn::after {
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

    .quiz-btn:hover::after {
        width: 300px;
        height: 300px;
    }

    .quiz-btn:hover {
        background: linear-gradient(135deg, #00ff65, #00e5ff);
        transform: translateY(-8px) scale(1.05);
        box-shadow: 
            0 25px 60px rgba(0, 255, 65, 0.5),
            0 0 50px rgba(0, 212, 255, 0.4);
        border-color: var(--neon-gold);
    }

    /* Login Button Variant */
    .login-btn {
        background: linear-gradient(135deg, var(--neon-purple), var(--neon-pink));
        box-shadow: 
            0 15px 40px rgba(179, 71, 217, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
    }

    .login-btn:hover {
        background: linear-gradient(135deg, #d147ff, #ff1493);
        box-shadow: 
            0 25px 60px rgba(179, 71, 217, 0.5),
            0 0 50px rgba(255, 0, 128, 0.4);
    }

    /* Cyber Circuit Decoration */
    .circuit-decoration {
        position: absolute;
        top: 50%;
        left: 5%;
        width: 200px;
        height: 200px;
        opacity: 0.2;
        animation: circuitPulse 5s ease-in-out infinite;
        z-index: -1;
    }

    .circuit-decoration::before,
    .circuit-decoration::after {
        content: '';
        position: absolute;
        background: var(--neon-blue);
        animation: circuitFlow 3s linear infinite;
    }

    .circuit-decoration::before {
        width: 100%;
        height: 2px;
        top: 50%;
        left: 0;
    }

    .circuit-decoration::after {
        width: 2px;
        height: 100%;
        left: 50%;
        top: 0;
        animation-delay: 1.5s;
    }

    @keyframes circuitPulse {
        0%, 100% { opacity: 0.2; transform: scale(1); }
        50% { opacity: 0.4; transform: scale(1.1); }
    }

    @keyframes circuitFlow {
        0% { box-shadow: 0 0 0 var(--neon-blue); }
        50% { box-shadow: 0 0 20px var(--neon-blue); }
        100% { box-shadow: 0 0 0 var(--neon-blue); }
    }

    /* Right side decoration */
    .circuit-decoration.right {
        left: auto;
        right: 5%;
        animation-delay: 2s;
    }

    .circuit-decoration.right::before,
    .circuit-decoration.right::after {
        background: var(--neon-purple);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .title {
            font-size: 4.5rem;
            letter-spacing: 6px;
        }
        
        .quiz-btn {
            padding: 1.2rem 3rem;
            font-size: 1.2rem;
            letter-spacing: 2px;
        }
        
        .main-img {
            padding: 3rem 1.5rem;
        }
    }

    @media (max-width: 768px) {
        nav {
            padding: 1rem 1.5rem;
            flex-direction: column;
            gap: 1rem;
        }
        
        .title {
            font-size: 3.5rem;
            letter-spacing: 4px;
            margin-bottom: 1.5rem;
        }
        
        .title::before {
            content: 'MISTER QUIZ';
        }
        
        .quiz-btn {
            padding: 1rem 2rem;
            font-size: 1rem;
            letter-spacing: 1px;
        }
        
        .main-img {
            padding: 2rem 1rem;
            min-height: 70vh;
        }
        
        .btn {
            padding: 0.6rem 1.5rem;
            font-size: 0.9rem;
        }
        
        .circuit-decoration {
            width: 150px;
            height: 150px;
        }
    }

    @media (max-width: 480px) {
        .title {
            font-size: 2.5rem;
            letter-spacing: 2px;
        }
        
        .quiz-btn {
            padding: 0.8rem 1.5rem;
            font-size: 0.9rem;
            width: 100%;
            max-width: 300px;
        }
        
        .main-img::before,
        .main-img::after {
            display: none;
        }
        
        .circuit-decoration {
            display: none;
        }
    }

    /* Particle Effects */
    .particle {
        position: absolute;
        width: 3px;
        height: 3px;
        background: var(--neon-blue);
        border-radius: 50%;
        pointer-events: none;
        animation: particleFloat 6s linear infinite;
        opacity: 0;
    }

    @keyframes particleFloat {
        0% { 
            transform: translateY(100vh) translateX(0);
            opacity: 0;
        }
        10% { opacity: 1; }
        90% { opacity: 1; }
        100% { 
            transform: translateY(-100px) translateX(50px);
            opacity: 0;
        }
    }

    /* Add some particles */
    .main-img .particle:nth-child(1) { 
        left: 10%; 
        animation-delay: 0s; 
        background: var(--neon-blue);
    }
    .main-img .particle:nth-child(2) { 
        left: 20%; 
        animation-delay: 1s; 
        background: var(--neon-purple);
    }
    .main-img .particle:nth-child(3) { 
        left: 30%; 
        animation-delay: 2s; 
        background: var(--neon-pink);
    }
    .main-img .particle:nth-child(4) { 
        left: 70%; 
        animation-delay: 3s; 
        background: var(--neon-green);
    }
    .main-img .particle:nth-child(5) { 
        left: 80%; 
        animation-delay: 4s; 
        background: var(--neon-gold);
    }
    .main-img .particle:nth-child(6) { 
        left: 90%; 
        animation-delay: 5s; 
        background: var(--neon-blue);
    }
</style>

<nav>
    <a class="btn" href="{{ route('leaderboard') }}"><i class="fas fa-medal"></i> Leaderboard</a>

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

<div class="main-img">
    <h1 class="title">Mister Quiz</h1>


    @auth
        <a class="btn" style="margin-bottom:20px" href="{{ route('quiz') }}">Start Quiz <i class="fas fa-play"></i></a>
    @else
        <a class="btn" style="margin-bottom:20px" href="{{ route('login') }}">Login to Start Quiz <i class="fas fa-play"></i></a>
    @endauth
</div>
@endsection