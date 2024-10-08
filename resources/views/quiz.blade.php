@extends('app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen">
    <p class="text-4xl font-bold mb-8">THE QUIZ PAGE</p>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Quiz Submitted!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- Display validation errors -->
    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Quiz form -->
    <form action="{{ route('quiz.submit') }}" method="POST">
        @csrf
        @if (count($questions) > 0)
            @foreach ($questions as $question)
                <div class="mb-4">
                    <p class="font-bold">{{ $question->text }}</p>
                    <span class="badge bg-primary">{{ $question->category->name }}</span>
                    @foreach ($question->answers as $answer)
                        <div>
                            <input type="radio" 
                                   name="questions[{{ $question->id }}]" 
                                   value="{{ $answer->id }}"
                                   {{ old("questions.$question->id") == $answer->id ? 'checked' : '' }} required>
                            <label>{{ $answer->answer_text }}</label>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <p>No questions available for this quiz.</p>
        @endif

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit Quiz</button>
    </form>
</div>
@endsection