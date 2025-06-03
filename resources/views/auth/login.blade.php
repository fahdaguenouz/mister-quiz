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

        /* Animated Matrix-style Background */
        .matrix-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 30%, #312e81 60%, #1e1b4b 100%);
        }

        .matrix-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 25% 25%, rgba(139, 92, 246, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(6, 182, 212, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(245, 158, 11, 0.15) 0%, transparent 50%);
            animation: matrixPulse 6s ease-in-out infinite;
        }

        @keyframes matrixPulse {
            0%, 100% { opacity: 1; transform: scale(1) rotate(0deg); }
            33% { opacity: 0.7; transform: scale(1.05) rotate(1deg); }
            66% { opacity: 0.9; transform: scale(0.98) rotate(-1deg); }
        }

        /* Digital Rain Effect */
        .digital-rain {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
            overflow: hidden;
        }

        .rain-drop {
            position: absolute;
            color: rgba(139, 92, 246, 0.3);
            font-family: 'JetBrains Mono', monospace;
            font-size: 12px;
            animation: digitalFall 8s linear infinite;
            text-shadow: 0 0 8px rgba(139, 92, 246, 0.5);
        }

        .rain-drop:nth-child(odd) {
            color: rgba(6, 182, 212, 0.3);
            text-shadow: 0 0 8px rgba(6, 182, 212, 0.5);
        }

        @keyframes digitalFall {
            0% { transform: translateY(-100px); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(100vh); opacity: 0; }
        }

        /* Floating Geometric Shapes */
        .geometric-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .shape {
            position: absolute;
            border: 1px solid rgba(255, 255, 255, 0.1);
            animation: floatShape 20s infinite linear;
        }

        .shape:nth-child(1) { 
            width: 60px; height: 60px; 
            left: 10%; top: 20%; 
            animation-delay: 0s;
            border-radius: 50%;
        }
        .shape:nth-child(2) { 
            width: 40px; height: 40px; 
            left: 80%; top: 30%; 
            animation-delay: 5s;
        }
        .shape:nth-child(3) { 
            width: 80px; height: 80px; 
            left: 20%; top: 70%; 
            animation-delay: 10s;
            transform: rotate(45deg);
        }
        .shape:nth-child(4) { 
            width: 50px; height: 50px; 
            left: 70%; top: 60%; 
            animation-delay: 15s;
            border-radius: 50%;
        }

        @keyframes floatShape {
            0% { transform: translateY(0px) rotate(0deg); opacity: 0.3; }
            25% { transform: translateY(-20px) rotate(90deg); opacity: 0.6; }
            50% { transform: translateY(0px) rotate(180deg); opacity: 0.3; }
            75% { transform: translateY(-10px) rotate(270deg); opacity: 0.6; }
            100% { transform: translateY(0px) rotate(360deg); opacity: 0.3; }
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

        /* Login Form */
        .auth-container {
            background: var(--glass);
            backdrop-filter: blur(30px);
            border: 1px solid var(--glass-border);
            padding: 3.5rem;
            border-radius: 24px;
            width: 100%;
            max-width: 420px;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
            margin :auto;
            top: 25%;
            animation: slideUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Animated top border */
        .auth-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--primary), var(--secondary), var(--accent), transparent);
            animation: borderScan 3s infinite;
        }

        @keyframes borderScan {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        /* Form Header */
        .form-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .form-title {
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #fff 0%, #e2e8f0 50%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.75rem;
            animation: titleGlow 4s ease-in-out infinite alternate;
        }

        @keyframes titleGlow {
            from { 
                text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
                transform: scale(1);
            }
            to { 
                text-shadow: 0 0 30px rgba(255, 255, 255, 0.8), 0 0 40px rgba(139, 92, 246, 0.4);
                transform: scale(1.02);
            }
        }

        .form-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.1rem;
            font-weight: 400;
            margin-bottom: 1rem;
        }

        .welcome-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 1rem;
            animation: iconPulse 2s ease-in-out infinite;
        }

        @keyframes iconPulse {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.1); opacity: 1; }
        }

        /* Input Groups */
        .input-group {
            margin-bottom: 2rem;
            position: relative;
        }

        .input-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 18px;
        }

        .auth-input {
            width: 100%;
            padding: 1.4rem 1.75rem 1.4rem 4rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            border-radius: 18px;
            font-size: 1.05rem;
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
                inset 0 1px 0 rgba(255, 255, 255, 0.1),
                0 8px 25px rgba(139, 92, 246, 0.15);
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
            font-size: 1.2rem;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .auth-input:focus + .input-icon {
            color: var(--primary);
            transform: translateY(-50%) scale(1.1);
            text-shadow: 0 0 10px rgba(139, 92, 246, 0.5);
        }

        /* Floating Label Effect */
        .floating-label {
            position: absolute;
            left: 4rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.5);
            font-size: 1.05rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
            font-weight: 400;
        }

        .auth-input:focus ~ .floating-label,
        .auth-input:not(:placeholder-shown) ~ .floating-label {
            top: 0.5rem;
            left: 1rem;
            font-size: 0.75rem;
            color: var(--primary);
            font-weight: 600;
        }

        /* Submit Button */
        .auth-btn {
            width: 100%;
            padding: 1.4rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 18px;
            font-size: 1.15rem;
            font-weight: 700;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
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
            transform: translateY(-4px) scale(1.02);
            box-shadow: 
                0 25px 50px rgba(139, 92, 246, 0.5),
                0 0 30px rgba(139, 92, 246, 0.4);
            background: linear-gradient(135deg, #9d65ff, #14b8d4);
        }

        .auth-btn:active {
            transform: translateY(-2px) scale(1.01);
        }

        /* Forgot Password Link */
        .forgot-password {
            text-align: center;
            margin-bottom: 2rem;
        }

        .forgot-link {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .forgot-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: width 0.3s ease;
        }

        .forgot-link:hover {
            color: var(--primary);
            transform: translateY(-1px);
        }

        .forgot-link:hover::after {
            width: 100%;
        }

        /* Error Messages */
        .error-msg {
            color: var(--danger);
            font-size: 0.875rem;
            margin-top: 0.75rem;
            padding: 1rem 1.25rem;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            animation: errorSlide 0.4s ease;
            border-left: 4px solid var(--danger);
        }

        @keyframes errorSlide {
            from {
                opacity: 0;
                transform: translateX(-20px) scale(0.95);
            }
        }

        /* Success Messages */
        .success-msg {
            color: var(--success);
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            padding: 1rem 1.25rem;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            animation: successPulse 0.5s ease;
            border-left: 4px solid var(--success);
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
            padding: 0.5rem 0;
        }

        .auth-link::after {
            content: '';
            position: absolute;
            bottom: 0;
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

        /* Social Login Section */
        .social-login {
            margin-top: 2rem;
            text-align: center;
        }

        .divider {
            position: relative;
            margin: 2rem 0;
            text-align: center;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        }

        .divider span {
            background: var(--glass);
            padding: 0 1rem;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.875rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }
            
            .auth-container {
                padding: 2.5rem 2rem;
                margin: 1rem 0;
            }
            
            .back-btn {
                top: 1rem;
                right: 1rem;
                padding: 0.75rem 1.5rem;
                font-size: 0.85rem;
            }
            
            .form-title {
                font-size: 2.2rem;
            }
            
            .welcome-icon {
                font-size: 2.5rem;
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
            width: 24px;
            height: 24px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Security Badge */
        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 1.5rem;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.8rem;
        }

        .security-badge i {
            margin-right: 0.5rem;
            color: var(--success);
        }
</style>

<a class="back-btn" href="{{ route('home') }}"><i class="fas fa-arrow-left"></i> Back</a>

<div class="auth-container">
    <p class="form-header">Welcome Back</p>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="input-group">
            <input class="auth-input" type="text" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}">
            @error('email')
                <div class="error-msg">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group">
            <input class="auth-input" type="password" name="password" id="password" placeholder="Enter your password">
            @error('password')
                <div class="error-msg">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="auth-btn" type="submit">Sign In</button>
        
        @if (session('status'))
            <div class="error-msg">
                {{ session('status') }}
            </div>
        @endif
        
        <a class="auth-link" href="{{ route('register') }}">Don't have an account? Create one</a>
    </form>
</div>

@endsection