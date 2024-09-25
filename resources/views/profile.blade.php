@extends('app')

@section('content')

<a class="absolute top-4 right-4 bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-200" href="{{ route('home') }}">
    Back &gt;
</a>

<div class="flex flex-col items-center justify-center mt-24">
    <div class="w-full max-w-lg bg-white shadow-md rounded-lg p-6 mb-6">
        <p class="text-4xl font-bold text-center mb-4">{{ auth()->user()->username }}</p>
        <p class="text-lg text-gray-600 text-center">{{ auth()->user()->email }}</p>
    </div>

    <div class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
        <p class="text-2xl font-bold text-center">{{ auth()->user()->xp }} XP</p>
    </div>
</div>

@endsection
