<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mister Quiz</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Custom CSS (if needed) -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-white hover:bg-gray-700 p-2 rounded" href="{{ route('home') }}">Home</a>

            @auth
            <div class="flex space-x-4">
                <a class="text-white hover:bg-gray-700 p-2 rounded" href="{{ route('profile') }}">{{ auth()->user()->username }}</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:bg-gray-700 p-2 rounded">Logout</button>
                </form>
            </div>
            @endauth

            @guest
            <div class="flex space-x-4">
                <a class="text-white hover:bg-gray-700 p-2 rounded" href="{{ route('register') }}">Register</a>
                <a class="text-white hover:bg-gray-700 p-2 rounded" href="{{ route('login') }}">Login</a>
            </div>
            @endguest

            <a class="text-white hover:bg-gray-700 p-2 rounded" href="{{ route('leaderboard') }}">Leaderboard</a>
        </div>
    </nav>

    @yield('content')
</body>
</html>
