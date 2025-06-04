@extends('app')

@section('content')
<style>
   * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #8b5cf6;
            --secondary: #06b6d4;
            --accent: #f59e0b;
            --danger: #ef4444;
            --success: #10b981;
            --dark: #0f172a;
            --light: #f8fafc;
            --glass: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --neon-glow: 0 0 20px rgba(139, 92, 246, 0.5);
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: #0f172a;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated Background */
        .cosmic-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 30%, #312e81 60%, #1e1b4b 100%);
        }

        .cosmic-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(139, 92, 246, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(6, 182, 212, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(245, 158, 11, 0.2) 0%, transparent 50%);
            animation: cosmicPulse 8s ease-in-out infinite;
        }

        @keyframes cosmicPulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.1); }
        }

        /* Floating Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        .particle:nth-child(1) { width: 4px; height: 4px; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 6px; height: 6px; left: 20%; animation-delay: 2s; }
        .particle:nth-child(3) { width: 3px; height: 3px; left: 30%; animation-delay: 4s; }
        .particle:nth-child(4) { width: 5px; height: 5px; left: 40%; animation-delay: 6s; }
        .particle:nth-child(5) { width: 4px; height: 4px; left: 50%; animation-delay: 8s; }
        .particle:nth-child(6) { width: 7px; height: 7px; left: 60%; animation-delay: 10s; }
        .particle:nth-child(7) { width: 3px; height: 3px; left: 70%; animation-delay: 12s; }
        .particle:nth-child(8) { width: 5px; height: 5px; left: 80%; animation-delay: 14s; }
        .particle:nth-child(9) { width: 4px; height: 4px; left: 90%; animation-delay: 16s; }

        @keyframes float {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
        }

        /* Back Button */
        .back-btn {
            position: fixed;
            top: 2rem;
            right: 2rem;
            background: var(--glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), var(--neon-glow);
        }

        .back-btn i {
            margin-right: 0.5rem;
            transition: transform 0.3s ease;
        }

        .back-btn:hover i {
            transform: translateX(-3px);
        }

        /* Main Container */
        .main-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
        }

        /* Registration Form */
        .auth-container {
            background: var(--glass);
            backdrop-filter: blur(30px);
            border: 1px solid var(--glass-border);
            padding: 3rem;
            border-radius: 24px;
            width: 100%;
            max-width: 450px;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            margin : auto;
            top: 25%;
            overflow: hidden;
            animation: slideUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .auth-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--primary), var(--secondary), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* Form Header */
        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .form-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #fff, #e2e8f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            animation: glow 3s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 20px rgba(255, 255, 255, 0.5); }
            to { text-shadow: 0 0 30px rgba(255, 255, 255, 0.8), 0 0 40px rgba(139, 92, 246, 0.3); }
        }

        .form-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
            font-weight: 400;
        }

        /* Input Groups */
        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .input-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
        }

        .auth-input {
            width: 100%;
            padding: 1.25rem 1.5rem 1.25rem 3.5rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            font-size: 1rem;
            color: white;
            font-weight: 500;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }

        .auth-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
            font-weight: 400;
        }

        .auth-input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--primary);
            box-shadow: 
                0 0 0 3px rgba(139, 92, 246, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
    .password-toggle{
                position: absolute;
                right: 1.5rem;
                top: 50%;
                transform: translateY(-50%);
                background: transparent;
                border: none;
                color: rgba(255, 255, 255, 0.5);
                cursor: pointer;
                font-size: 1.2rem;
                transition: color 0.3s ease;
            }
        .input-icon {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
            font-size: 1.1rem;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .auth-input:focus + .input-icon {
            color: var(--primary);
            transform: translateY(-50%) scale(1.1);
        }

        /* Animated Border Effect */
        .input-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, var(--primary), var(--secondary), var(--accent));
            border-radius: 16px;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .auth-input:focus ~ .input-wrapper::before {
            opacity: 0.1;
        }

        /* Submit Button */
        .auth-btn {
            width: 100%;
            padding: 1.25rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .auth-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .auth-btn:hover::before {
            left: 100%;
        }

        .auth-btn:hover {
            transform: translateY(-3px);
            box-shadow: 
                0 20px 40px rgba(139, 92, 246, 0.4),
                0 0 30px rgba(139, 92, 246, 0.3);
        }

        .auth-btn:active {
            transform: translateY(-1px);
        }

        /* Error Messages */
        .error-msg {
            color: var(--danger);
            font-size: 0.875rem;
            margin-top: 0.75rem;
            padding: 0.75rem 1rem;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            animation: errorSlide 0.3s ease;
        }

        @keyframes errorSlide {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
        }

        /* Success Messages */
        .success-msg {
            color: var(--success);
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            animation: successPulse 0.5s ease;
        }

        @keyframes successPulse {
            0% { transform: scale(0.95); opacity: 0; }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Auth Link */
        .auth-link {
            display: block;
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .auth-link::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: width 0.3s ease;
        }

        .auth-link:hover {
            color: white;
            transform: translateY(-2px);
        }

        .auth-link:hover::after {
            width: 100%;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }
            
            .auth-container {
                padding: 2rem;
                margin: 1rem 0;
            }
            
            .back-btn {
                top: 1rem;
                right: 1rem;
                padding: 0.75rem 1.5rem;
                font-size: 0.85rem;
            }
            
            .form-title {
                font-size: 2rem;
            }
        }

        /* Loading Animation */
        .loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .loading .auth-btn {
            background: linear-gradient(135deg, #6b7280, #9ca3af);
        }

        .loading .auth-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: translate(-50%, -50%) rotate(360deg); }
        }
</style>

<a class="back-btn" href="{{ route('home') }}"><i class="fas fa-arrow-left"></i> Back</a>

<div class="auth-container">
    <p class="form-header">Join Us Today</p>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="input-group">
            <input class="auth-input" type="text" name="username" id="username" placeholder="Choose a username" value="{{ old('username') }}">
            @error('username')
                <div class="error-msg">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group">
            <input class="auth-input" type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}">
            @error('email')
                <div class="error-msg">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group">
            <input class="auth-input" type="password" name="password" id="password" placeholder="Create a password">
            <button type="button" class="password-toggle" onclick="togglePasswordVisibility()"><i class="fa-solid fa-eye"></i></button>
            @error('password')
                <div class="error-msg">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group">
            <input class="auth-input" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password">
            <button type="button" class="password-toggle password-toggle2" onclick="togglePasswordVisibility2()"><i class="fa-solid fa-eye"></i></button>

            @error('password_confirmation')
                <div class="error-msg">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <button class="auth-btn" type="submit">Create Account</button>

        @if (session('status'))
            <div class="success-msg">
                {{ session('status') }}
            </div>
        @endif
        
        <a class="auth-link" href="{{ route('login') }}">Already have an account? Sign in</a>
    </form>
</div>
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.querySelector('.password-toggle i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.classList.remove('fa-eye');
            toggleButton.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleButton.classList.remove('fa-eye-slash');
            toggleButton.classList.add('fa-eye');
        }
    }
    function togglePasswordVisibility2() {
        const passwordInput = document.getElementById('password_confirmation');
        const toggleButton = document.querySelector('.password-toggle2 i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.classList.remove('fa-eye');
            toggleButton.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleButton.classList.remove('fa-eye-slash');
            toggleButton.classList.add('fa-eye');
        }
    }
</script>
@endsection