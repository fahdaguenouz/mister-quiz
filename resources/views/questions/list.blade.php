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
        --danger: #ff3860;
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

    .quiz-container {
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
    .quiz-container::before {
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

    /* Floating Quiz Orb */
    .quiz-container::after {
        content: '';
        position: absolute;
        top: -80px;
        left: 50%;
        transform: translateX(-50%);
        width: 160px;
        height: 160px;
        background: radial-gradient(circle, var(--neon-green) 0%, transparent 70%);
        border-radius: 50%;
        animation: quizOrb 4s ease-in-out infinite;
        box-shadow: 
            0 0 80px var(--neon-green),
            inset 0 0 80px rgba(0, 255, 65, 0.3);
        opacity: 0.7;
    }

    @keyframes quizOrb {
        0%, 100% { 
            transform: translateX(-50%) translateY(0) scale(1);
            box-shadow: 0 0 80px var(--neon-green);
        }
        50% { 
            transform: translateX(-50%) translateY(-15px) scale(1.1);
            box-shadow: 0 0 120px var(--neon-green);
        }
    }

    .quiz-title {
        font-family: 'Orbitron', monospace;
        font-size: 3.5rem;
        font-weight: 900;
        text-align: center;
        margin-bottom: 3rem;
        background: linear-gradient(135deg, 
            var(--neon-green) 0%, 
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
            filter: drop-shadow(0 0 20px rgba(0, 255, 65, 0.6));
            transform: scale(1);
        }
        50% { 
            filter: drop-shadow(0 0 40px rgba(0, 212, 255, 0.8));
            transform: scale(1.02);
        }
    }

    .error {
        background: rgba(255, 56, 96, 0.2);
        border: 1px solid var(--danger);
        color: var(--text-primary);
        padding: 1.5rem;
        border-radius: 20px;
        margin-bottom: 2rem;
        font-weight: 600;
        text-align: center;
        backdrop-filter: blur(20px);
        box-shadow: 0 0 30px rgba(255, 56, 96, 0.3);
        animation: errorPulse 2s ease-in-out infinite;
        position: relative;
        overflow: hidden;
    }

    @keyframes errorPulse {
        0%, 100% { 
            box-shadow: 0 0 30px rgba(255, 56, 96, 0.3);
        }
        50% { 
            box-shadow: 0 0 50px rgba(255, 56, 96, 0.5);
        }
    }

    .error::before {
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
        animation: errorShimmer 2s ease infinite;
    }

    @keyframes errorShimmer {
        to { left: 100%; }
    }

    .quiz-form {
        display: flex;
        flex-direction: column;
        gap: 2.5rem;
        position: relative;
        z-index: 10;
    }

    .btn {
        align-self: center;
        background: linear-gradient(135deg, var(--neon-green), var(--neon-blue));
        color: var(--text-primary);
        padding: 1.2rem 4rem;
        border: none;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1.3rem;
        font-family: 'Orbitron', monospace;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-top: 2rem;
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
    }
    

    .no-questions {
        text-align: center;
        font-size: 1.5rem;
        color: var(--text-secondary);
        font-weight: 600;
        padding: 3rem 0;
        font-family: 'Orbitron', monospace;
        letter-spacing: 1px;
        background: var(--glass);
        backdrop-filter: blur(20px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        animation: noQuestionsGlow 3s ease-in-out infinite;
    }

    @keyframes noQuestionsGlow {
        0%, 100% { 
            box-shadow: 0 0 20px rgba(0, 212, 255, 0.2);
        }
        50% { 
            box-shadow: 0 0 40px rgba(0, 212, 255, 0.4);
        }
    }

    /* Enhance the question component styling (will be applied to the x-question component) */
    :root {
        --question-bg: rgba(255, 255, 255, 0.03);
        --question-border: rgba(255, 255, 255, 0.1);
        --option-bg: rgba(255, 255, 255, 0.05);
        --option-hover: rgba(0, 212, 255, 0.1);
        --option-border-hover: rgba(0, 212, 255, 0.5);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .quiz-container {
            margin: 1.5rem;
            padding: 2rem;
        }
        
        .quiz-title {
            font-size: 2.5rem;
            letter-spacing: 3px;
        }
        
        .btn {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
        }
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