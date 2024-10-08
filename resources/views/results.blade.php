@extends('app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen">
    <p class="text-4xl font-bold mb-8">QUIZ RESULTS</p>

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

    <p>Your score: {{ session('correct_answers') }} out of {{ session('total_questions') }}</p>
    <p>Total XP gained: {{ session('total_xp') }}</p>

    <div class="mt-8 w-full max-w-lg">
        @foreach (session('questions_data') as $questionId => $data)
            <div class="mb-4 p-4 border rounded">
                <p class="font-bold">{{ $data['question'] }}</p>

                <p>Your answer:</p>
                @php
                    // Get the user's selected answer
                    $selectedAnswer = $data['answers']->firstWhere('id', $data['user_answer']);
                    $isAnswerCorrect = $data['is_correct'];
                @endphp

                <span class="block {{ $isAnswerCorrect ? 'text-green-600' : 'text-red-600' }}">
                    {{ $selectedAnswer->answer_text }} - {{ $isAnswerCorrect ? '✔️ Correct' : '❌ Incorrect' }}
                </span>

                @if (!$isAnswerCorrect)
                    <p>Correct answer(s):</p>
                    @foreach ($data['correct_answers'] as $correctAnswerId)
                        @php
                            // Get the correct answer text
                            $correctAnswer = $data['answers']->firstWhere('id', $correctAnswerId);
                        @endphp
                        <span class="block text-green-600">
                            {{ $correctAnswer->answer_text }} - Correct
                        </span>
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection