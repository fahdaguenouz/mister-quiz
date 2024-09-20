@extends('app')

@section('content')

<a class="top-right-corner red-btn" href="{{ route('home') }}">Back ></a>

<div>
    <div>
        <p class="title form-header">Register form</p>
    </div>

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb4">
            <input class="center auth-input" type="text" name="username" id="username" placeholder="Enter username" value="{{ old('username')}}">

            @error('username')
            <div class="error-msg mt2 center">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb4">
            <input class="center auth-input" type="text" name="email" id="email" placeholder="Enter email" value="{{ old('email')}}">

            @error('email')
            <div class="error-msg mt2 center">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb4">
            <input class="center auth-input" type="password" name="password" id="password" placeholder="Enter password">

            @error('password')
            <div class=" error-msg mt2 center">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb4">
            <input class="center auth-input" type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter password confirmation">

            @error('password_confirmation')
            <div class="error-msg mt2 center">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button class="center green-btn mb4" style="cursor: pointer;" type="submit">Register</button>

        <a class="center simple-link" href="{{ route('login') }}">Already have an account? Login</a>
    </form>
</div>

@endsection