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
    box-shadow: none;
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

/* Profile Container */
.profile-container {
    max-width: 1200px;
    margin: 3rem auto;
    padding: 0;
    position: relative;
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

/* Back Link */
.back-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--neon-blue);
    text-decoration: none;
    font-weight: 600;
    margin-bottom: 2rem;
    margin-left: 3rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    font-family: 'Space Grotesk', sans-serif;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 0.8rem 1.5rem;
    background: var(--glass);
    backdrop-filter: blur(15px);
    border: 1px solid var(--glass-border);
    border-radius: 50px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

.back-link:hover {
    transform: translateX(-5px) translateY(-3px);
    background: rgba(0, 212, 255, 0.1);
    border-color: var(--neon-blue);
    box-shadow: 
        0 15px 40px rgba(0, 0, 0, 0.4),
        0 0 30px rgba(0, 212, 255, 0.3);
    text-decoration: none;
    color: var(--neon-blue);
}

/* Profile Header */
.profile-header {
    background: var(--glass);
    backdrop-filter: blur(30px);
    padding: 3rem;
    border-radius: 30px 30px 0 0;
    box-shadow: 
        0 25px 80px rgba(0, 0, 0, 0.8),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    text-align: center;
    position: relative;
    overflow: hidden;
    border: 1px solid var(--glass-border);
}

/* Holographic Border Effect for Header */
.profile-header::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    height: 5px;
    background: linear-gradient(90deg, 
        var(--neon-blue), 
        var(--neon-purple), 
        var(--neon-pink), 
        var(--neon-green),
        var(--neon-blue)
    );
    animation: holoBorder 6s linear infinite;
    opacity: 0.8;
}

@keyframes holoBorder {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

/* Floating User Orb */
.profile-header::after {
    content: '';
    position: absolute;
    top: -50px;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 100px;
    background: radial-gradient(circle, var(--neon-blue) 0%, transparent 70%);
    border-radius: 50%;
    animation: userOrb 4s ease-in-out infinite;
    box-shadow: 
        0 0 80px var(--neon-blue),
        inset 0 0 80px rgba(0, 212, 255, 0.3);
    opacity: 0.6;
}

@keyframes userOrb {
    0%, 100% { 
        transform: translateX(-50%) translateY(0) scale(1);
        box-shadow: 0 0 80px var(--neon-blue);
    }
    50% { 
        transform: translateX(-50%) translateY(-15px) scale(1.1);
        box-shadow: 0 0 120px var(--neon-blue);
    }
}

.profile-name {
    font-family: 'Orbitron', monospace;
    font-size: 3rem;
    font-weight: 900;
    margin: 0 0 1rem 0;
    background: linear-gradient(135deg, 
        var(--neon-blue) 0%, 
        var(--neon-purple) 50%, 
        var(--neon-pink) 100%
    );
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: titlePulse 3s ease-in-out infinite;
    text-transform: uppercase;
    letter-spacing: 4px;
    text-shadow: 0 0 30px rgba(0, 212, 255, 0.6);
}

@keyframes titlePulse {
    0%, 100% { 
        filter: drop-shadow(0 0 30px rgba(0, 212, 255, 0.6));
        transform: scale(1);
    }
    50% { 
        filter: drop-shadow(0 0 60px rgba(179, 71, 217, 0.8));
        transform: scale(1.02);
    }
}

.profile-email {
    color: var(--text-secondary);
    margin: 0;
    font-size: 1.2rem;
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 400;
    letter-spacing: 1px;
}

/* Profile XP Section */
.profile-xp-section {
    background: linear-gradient(135deg, var(--neon-purple), var(--neon-pink));
    color: white;
    padding: 2.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 
        0 15px 40px rgba(179, 71, 217, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
    position: relative;
    overflow: hidden;
    border-left: 1px solid var(--glass-border);
    border-right: 1px solid var(--glass-border);
}

.profile-xp-section::before {
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
    animation: xpShimmer 4s ease-in-out infinite;
}

@keyframes xpShimmer {
    0%, 100% { left: -100%; }
    50% { left: 100%; }
}

.profile-xp {
    font-family: 'Orbitron', monospace;
    font-size: 2.5rem;
    font-weight: 900;
    margin: 0;
    text-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
    animation: xpPulse 2s ease-in-out infinite;
}

@keyframes xpPulse {
    0%, 100% { 
        transform: scale(1);
        text-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
    }
    50% { 
        transform: scale(1.05);
        text-shadow: 0 0 30px rgba(255, 255, 255, 1);
    }
}

.profile-rank {
    background-color: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 700;
    margin: 0;
    font-family: 'Orbitron', monospace;
    text-transform: uppercase;
    letter-spacing: 2px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 
        0 8px 25px rgba(0, 0, 0, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
}

.profile-rank span {
    font-size: 1.3rem;
    font-weight: 900;
}

/* Profile Stats */
.profile-stats {
    padding: 3rem;
    background: var(--glass);
    backdrop-filter: blur(30px);
    border-radius: 0 0 30px 30px;
    box-shadow: 
        0 25px 80px rgba(0, 0, 0, 0.8),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    border: 1px solid var(--glass-border);
    border-top: none;
    position: relative;
    overflow: hidden;
}

.profile-stats::before {
    content: '';
    position: absolute;
    bottom: -2px;
    left: -2px;
    right: -2px;
    height: 3px;
    background: linear-gradient(90deg, 
        var(--neon-green), 
        var(--neon-blue), 
        var(--neon-purple), 
        var(--neon-pink),
        var(--neon-green)
    );
    animation: statsGlow 8s linear infinite;
    opacity: 0.8;
}

@keyframes statsGlow {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.profile-stats h2 {
    margin-top: 0;
    margin-bottom: 2rem;
    font-family: 'Orbitron', monospace;
    font-size: 2.2rem;
    font-weight: 900;
    background: linear-gradient(135deg, 
        var(--neon-green) 0%, 
        var(--neon-blue) 100%
    );
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-transform: uppercase;
    letter-spacing: 3px;
    position: relative;
    padding-bottom: 1rem;
    text-align: center;
}

.profile-stats h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background: linear-gradient(90deg, var(--neon-green), var(--neon-blue));
    animation: underlineGlow 2s ease-in-out infinite;
}

@keyframes underlineGlow {
    0%, 100% { 
        box-shadow: 0 0 10px currentColor;
        width: 100px;
    }
    50% { 
        box-shadow: 0 0 20px currentColor;
        width: 150px;
    }
}

/* Stats Table */
.stats-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 1rem;
    margin-top: 2rem;
}

.stats-table thead th {
    background: linear-gradient(135deg, var(--neon-green), var(--neon-blue));
    color: var(--text-primary);
    padding: 1.8rem 1.5rem;
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

.stats-table thead th:first-child {
    border-radius: 20px 0 0 20px;
}

.stats-table thead th:last-child {
    border-radius: 0 20px 20px 0;
}

.stats-table tbody tr {
    background: var(--glass);
    backdrop-filter: blur(20px);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    animation: rowAppear 0.6s ease forwards;
    opacity: 0;
    transform: translateX(-50px);
}

@keyframes rowAppear {
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.stats-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
.stats-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
.stats-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
.stats-table tbody tr:nth-child(4) { animation-delay: 0.4s; }
.stats-table tbody tr:nth-child(5) { animation-delay: 0.5s; }

.stats-table tbody tr:hover {
    background: rgba(0, 255, 65, 0.1);
    border-color: var(--neon-green);
    transform: translateY(-8px) scale(1.02);
    box-shadow: 
        0 20px 50px rgba(0, 0, 0, 0.5),
        0 0 50px rgba(0, 255, 65, 0.3);
}

.stats-table tbody tr:hover::before {
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
    animation: rowShimmer 0.8s ease;
}

@keyframes rowShimmer {
    to { left: 100%; }
}

.stats-table td {
    padding: 1.8rem 1.5rem;
    font-size: 1.1rem;
    font-weight: 500;
    color: var(--text-primary);
    position: relative;
    font-family: 'Space Grotesk', sans-serif;
}

.stats-table td:first-child {
    border-radius: 20px 0 0 20px;
    font-weight: 600;
    color: var(--neon-blue);
    text-transform: capitalize;
    font-size: 1.2rem;
}

.stats-table td:last-child {
    border-radius: 0 20px 20px 0;
}

.stats-table td:nth-child(2),
.stats-table td:nth-child(3),
.stats-table td:nth-child(4) {
    font-family: 'Orbitron', monospace;
    font-weight: 600;
}

.stats-table td:nth-child(4) {
    background: linear-gradient(135deg, var(--neon-green), var(--neon-blue));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 700;
    font-size: 1.2rem;
}

/* Empty State */
.stats-table tbody tr td[colspan="4"] {
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
.quiz-btn {
    display: block;
    width: fit-content;
    margin: 3rem auto 0;
    padding: 1.5rem 3rem;
    font-size: 1.3rem;
    font-weight: 700;
    font-family: 'Orbitron', monospace;
    background: linear-gradient(135deg, var(--neon-pink), var(--neon-purple));
    border: none;
    text-transform: uppercase;
    letter-spacing: 3px;
    box-shadow: 
        0 15px 40px rgba(255, 0, 128, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.2);
    position: relative;
    overflow: hidden;
    color: white;
    text-decoration: none;
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
    background: linear-gradient(135deg, #ff1a96, #d147ff);
    transform: translateY(-8px) scale(1.05);
    box-shadow: 
        0 25px 60px rgba(255, 0, 128, 0.5),
        0 0 50px rgba(179, 71, 217, 0.4);
    text-decoration: none;
    color: white;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .profile-container {
        margin: 2rem;
    }
    
    .back-link {
        margin-left: 0;
    }
    
    .profile-header,
    .profile-stats {
        padding: 2rem;
    }
    
    .profile-name {
        font-size: 2.5rem;
        letter-spacing: 3px;
    }
}

@media (max-width: 768px) {
    nav {
        padding: 1rem 1.5rem;
        flex-direction: column;
        gap: 1rem;
    }
    
    .profile-container {
        margin: 1rem;
    }
    
    .back-link {
        margin-bottom: 1.5rem;
        padding: 0.6rem 1.2rem;
        font-size: 0.9rem;
    }
    
    .profile-header,
    .profile-stats {
        padding: 1.5rem;
    }
    
    .profile-name {
        font-size: 2rem;
        letter-spacing: 2px;
    }
    
    .profile-xp-section {
        flex-direction: column;
        gap: 1.5rem;
        align-items: center;
        text-align: center;
        padding: 2rem;
    }
    
    .profile-xp {
        font-size: 2rem;
    }
    
    .stats-table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
    
    .stats-table thead,
    .stats-table tbody,
    .stats-table th,
    .stats-table td,
    .stats-table tr {
        display: block;
    }
    
    .stats-table thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }
    
    .stats-table tbody tr {
        margin-bottom: 1rem;
        padding: 1.5rem;
        border-radius: 20px;
        display: block;
        white-space: normal;
    }
    
    .stats-table td {
        border: none;
        position: relative;
        padding: 0.5rem 0;
        padding-left: 50%;
        text-align: left;
        white-space: normal;
    }
    
    .stats-table td:before {
        content: attr(data-label) ": ";
        position: absolute;
        left: 0;
        width: 45%;
        padding-right: 10px;
        white-space: nowrap;
        font-weight: 600;
        color: var(--neon-green);
        font-family: 'Orbitron', monospace;
        text-transform: uppercase;
        font-size: 0.9rem;
    }
    
    .btn {
        padding: 0.8rem 1.5rem;
        font-size: 0.9rem;
    }
    
    .quiz-btn {
        padding: 1.2rem 2rem;
        font-size: 1.1rem;
        letter-spacing: 2px;
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