@props(['question' => $question])

<div class="question">
    <p><strong>{{ $question['question'] }}</strong></p>
    <div class="details">
        <span>{{ $question['category'] }}</span>
        <span>{{ $question['xp'] }} XP</span>
    </div>
    <input type="hidden" name="question_id[]" value="{{ $question['id'] }}">

    @foreach ($question['answers'] as $answer)
        <div class="answer">
            <label>
                <input type="radio" name="answer_{{ $question['id'] }}" value="{{ $answer['id'] }}" required>
                {{ $answer['answer'] }}
            </label>
        </div>
    @endforeach
</div>
