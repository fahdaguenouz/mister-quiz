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
    @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Quiz form goes here -->
    <form action="{{ route('quiz.submit') }}" method="POST">
        @csrf
        @foreach ($questions as $question)
            <div class="mb-4">
                <p class="font-bold">{{ $question->text }}</p>
                <span class="badge bg-primary">{{ $question->category->name }}</span>
                @foreach ($question->answers as $answer)
                    <div>
                        <input type="checkbox" 
                               name="questions[{{ $question->id }}][]" 
                               value="{{ $answer->id }}"
                               {{ in_array($answer->id, old("questions.$question->id", [])) ? 'checked' : '' }}>
                        <label>{{ $answer->answer_text }}</label>
                    </div>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit Quiz</button>
    </form>
</div>
@endsection
