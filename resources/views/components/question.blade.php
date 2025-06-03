@props(['question' => $question])

<style>
    .question {
        background: var(--glass);
        backdrop-filter: blur(30px);
        border: 1px solid var(--glass-border);
        border-radius: 25px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 
            0 15px 40px rgba(0, 0, 0, 0.3),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
        animation: questionAppear 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes questionAppear {
        from {
            opacity: 0;
            transform: translateY(50px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .question:hover {
        transform: translateY(-5px);
        box-shadow: 
            0 25px 60px rgba(0, 0, 0, 0.4),
            0 0 40px rgba(0, 212, 255, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        border-color: rgba(0, 212, 255, 0.3);
    }

    /* Holographic accent line */
    .question::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, 
            var(--neon-green), 
            var(--neon-blue), 
            var(--neon-purple), 
            var(--neon-pink),
            var(--neon-green)
        );
        animation: holographicFlow 4s linear infinite;
        border-radius: 25px 25px 0 0;
    }

    @keyframes holographicFlow {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    /* Floating data particles */
    .question::after {
        content: '';
        position: absolute;
        top: 20px;
        right: 20px;
        width: 8px;
        height: 8px;
        background: var(--neon-green);
        border-radius: 50%;
        box-shadow: 
            0 0 20px var(--neon-green),
            15px 10px 0 -2px var(--neon-blue),
            0 0 20px var(--neon-blue),
            -10px 20px 0 -3px var(--neon-purple),
            0 0 15px var(--neon-purple);
        animation: dataFloat 6s ease-in-out infinite;
    }

    @keyframes dataFloat {
        0%, 100% { 
            transform: translateY(0) rotate(0deg);
            opacity: 0.6;
        }
        33% { 
            transform: translateY(-10px) rotate(120deg);
            opacity: 1;
        }
        66% { 
            transform: translateY(5px) rotate(240deg);
            opacity: 0.8;
        }
    }

    .question p {
        font-family: 'Orbitron', monospace;
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 1.5rem;
        line-height: 1.4;
        text-shadow: 0 0 10px rgba(0, 255, 65, 0.3);
        letter-spacing: 0.5px;
    }

    .details {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding: 1rem 1.5rem;
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        backdrop-filter: blur(20px);
    }

    .details span {
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
    }

    .details span:first-child {
        color: var(--neon-blue);
        text-shadow: 0 0 8px rgba(0, 212, 255, 0.5);
    }

    .details span:last-child {
        color: var(--neon-gold);
        text-shadow: 0 0 8px rgba(255, 215, 0, 0.5);
        font-weight: 700;
    }

    .details span:last-child::before {
        content: '⚡ ';
        color: var(--neon-green);
        animation: xpPulse 2s ease-in-out infinite;
    }

    @keyframes xpPulse {
        0%, 100% { opacity: 0.6; }
        50% { opacity: 1; }
    }

    .answer {
        margin-bottom: 1.2rem;
        position: relative;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .answer label {
        display: flex;
        align-items: center;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 18px;
        padding: 1.5rem 2rem;
        cursor: pointer;
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 500;
        font-size: 1.1rem;
        color: var(--text-primary);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(20px);
        position: relative;
        overflow: hidden;
        user-select: none;
    }

    .answer label::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(0, 212, 255, 0.1), 
            transparent
        );
        transition: left 0.6s ease;
    }

    .answer:hover label::before {
        left: 100%;
    }

    .answer:hover label {
        background: rgba(0, 212, 255, 0.08);
        border-color: rgba(0, 212, 255, 0.3);
        transform: translateX(8px);
        box-shadow: 
            0 8px 25px rgba(0, 212, 255, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.1);
    }

    .answer input[type="radio"] {
        appearance: none;
        width: 24px;
        height: 24px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        margin-right: 1.5rem;
        position: relative;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: transparent;
        flex-shrink: 0;
    }

    .answer input[type="radio"]:checked {
        border-color: var(--neon-green);
        box-shadow: 
            0 0 20px rgba(0, 255, 65, 0.4),
            inset 0 0 0 4px var(--cyber-darker),
            inset 0 0 0 6px var(--neon-green);
        animation: radioSelect 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes radioSelect {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }

    .answer input[type="radio"]:checked::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 8px;
        height: 8px;
        background: var(--neon-green);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0 0 15px var(--neon-green);
        animation: innerGlow 1.5s ease-in-out infinite;
    }

    @keyframes innerGlow {
        0%, 100% { 
            box-shadow: 0 0 15px var(--neon-green);
            opacity: 1;
        }
        50% { 
            box-shadow: 0 0 25px var(--neon-green);
            opacity: 0.8;
        }
    }

    .answer input[type="radio"]:checked + span {
        color: var(--neon-green);
        text-shadow: 0 0 8px rgba(0, 255, 65, 0.3);
        font-weight: 600;
    }

    /* Selected answer styling */
    .answer:has(input[type="radio"]:checked) label {
        background: rgba(0, 255, 65, 0.08);
        border-color: rgba(0, 255, 65, 0.4);
        box-shadow: 
            0 0 30px rgba(0, 255, 65, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.15);
        transform: translateX(12px);
    }

    /* Cyber scan line effect */
    .answer:has(input[type="radio"]:checked) label::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent, 
            var(--neon-green), 
            transparent
        );
        animation: scanLine 2s ease-in-out infinite;
    }

    @keyframes scanLine {
        0% { transform: translateX(-100%); opacity: 0; }
        50% { opacity: 1; }
        100% { transform: translateX(100%); opacity: 0; }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .question {
            padding: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .question p {
            font-size: 1.2rem;
        }
        
        .details {
            flex-direction: column;
            gap: 0.5rem;
            text-align: center;
        }
        
        .answer label {
            padding: 1.2rem 1.5rem;
            font-size: 1rem;
        }
        
        .answer input[type="radio"] {
            width: 20px;
            height: 20px;
            margin-right: 1rem;
        }
    }
</style>

<div class="question">
    <p><strong>{{ $question['question'] }}</strong></p>
    <div class="details">
        <span>{{ $question['category'] }}</span>
        <span>{{ $question['xp'] }} XP</span>
    </div>
    <input type="hidden" name="question_id[]" value="{{ $question['id'] }}">

    @foreach ($question['answers'] as $answer)
        <div class="answer">
            <label>
                <input type="radio" name="answer_{{ $question['id'] }}" value="{{ $answer['id'] }}" required>
                {{ $answer['answer'] }}
            </label>
        </div>
    @endforeach
</div>
