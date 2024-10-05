@extends('app')

@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <table class="table-auto border-collapse border border-gray-900 bg-gray-900 shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-gray-900">
                <th class="px-6 py-3 border border-gray-900">Rank</th>
                <th class="px-6 py-3 border border-gray-900">Username</th>
                <th class="px-6 py-3 border border-gray-900">XP</th>
                <th class="px-6 py-3 border border-gray-900">Total Correct Answers</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
            <tr class="hover:bg-gray-100 transition duration-200">
                <td class="px-6 py-4 border border-gray-900">{{ $index + 1 }}</td>
                <td class="px-6 py-4 border border-gray-900">{{ $user->username }}</td>
                <td class="px-6 py-4 border border-gray-900">{{ $user->xp }}</td>
                <td class="px-6 py-4 border border-gray-900">{{ $user->total_correct_answers }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="mt-4 text-blue-500 hover:underline">Go Back</a>
</div>

@endsection
