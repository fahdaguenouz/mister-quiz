@extends('app')

@section('content')

<a class="top-right-corner red-btn" href="{{ route('home') }}">Back ></a>

<div>
    <div>
        <p class="title form-header">Login form</p>
    </div>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb4">
            <input class="auth-input center" type="text" name="email" id="email" placeholder="Enter email" value="{{ old('email')}}">

            @error('email')
            <div class="center error-msg mt2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb4">
            <input class="auth-input center" type="password" name="password" id="password" placeholder="Enter password">

            @error('password')
            <div class="center error-msg mt2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button class="center green-btn mb4" style="cursor: pointer;" type="submit">Login</button>
        @if (session('status'))
        <div class="center error-msg mt2">
            {{ session('status') }}
        </div>
        @endif
        <a class="center simple-link mt2" href="{{ route('register') }}">Don't have an account? Register</a>
    </form>
</div>

@endsection