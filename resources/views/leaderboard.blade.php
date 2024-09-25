@extends('app')

@section('content')

<div class="flex flex-col items-center justify-center min-h-screen">
    <table class="table-auto border-collapse border border-gray-900 bg-gray-900 shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-gray-900">
                <th class="px-6 py-3 border border-gray-900">Rank</th>
                <th class="px-6 py-3 border border-gray-900">Username</th>
                <th class="px-6 py-3 border border-gray-900">Score</th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover:bg-gray-100 transition duration-200">
                <td class="px-6 py-4 border border-gray-900">1</td>
                <td class="px-6 py-4 border border-gray-900">Farssi</td>
                <td class="px-6 py-4 border border-gray-900">400</td>
            </tr>
        </tbody>
    </table>
    <a href="{{route('home')}}">go back</a>
</div>

@endsection
