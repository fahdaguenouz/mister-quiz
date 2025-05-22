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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: var(--dark);
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    
    .back-btn {
        position: absolute;
        top: 2rem;
        right: 2rem;
        background-color: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.3);
    }
    
    .back-btn:hover {
        background-color: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
    }
    
    .auth-container {
        background-color: white;
        padding: 3rem;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        margin: 2rem;
        position: relative;
        overflow: hidden;
    }
    
    .auth-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
    }
    
    .form-header {
        text-align: center;
        margin-bottom: 2rem;
        font-size: 2rem;
        font-weight: 700;
        color: var(--dark);
        position: relative;
    }
    
    .form-header::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 3px;
        background-color: var(--primary);
    }
    
    .input-group {
        margin-bottom: 1.5rem;
        position: relative;
    }
    
    .auth-input {
        width: 100%;
        padding: 1rem 1.5rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #f8fafc;
        box-sizing: border-box;
    }
    
    .auth-input:focus {
        outline: none;
        border-color: var(--primary);
        background-color: white;
        box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
    }
    
    .auth-input::placeholder {
        color: #a0aec0;
    }
    
    .auth-btn {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, var(--success), #38a169);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 1.5rem;
    }
    
    .auth-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(72, 187, 120, 0.3);
    }
    
    .auth-btn:active {
        transform: translateY(0);
    }
    
    .error-msg {
        color: var(--danger);
        font-size: 0.875rem;
        margin-top: 0.5rem;
        text-align: center;
        background-color: rgba(229, 62, 62, 0.1);
        padding: 0.5rem;
        border-radius: 8px;
        border-left: 4px solid var(--danger);
    }
    
    .auth-link {
        display: block;
        text-align: center;
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }
    
    .auth-link:hover {
        color: #5a52d5;
        text-decoration: underline;
    }
    
    .success-msg {
        color: var(--success);
        font-size: 0.875rem;
        margin-bottom: 1rem;
        text-align: center;
        background-color: rgba(72, 187, 120, 0.1);
        padding: 0.75rem;
        border-radius: 8px;
        border-left: 4px solid var(--success);
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .auth-container {
            padding: 2rem;
            margin: 1rem;
        }
        
        .back-btn {
            top: 1rem;
            right: 1rem;
            padding: 0.4rem 1rem;
            font-size: 0.9rem;
        }
        
        .form-header {
            font-size: 1.8rem;
        }
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
            @error('password')
                <div class="error-msg">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="input-group">
            <input class="auth-input" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password">
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

@endsection