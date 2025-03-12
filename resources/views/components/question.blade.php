@props(['question'=>$question])

<div class="mb4">
    <p class="center title">{{ $question->question }}</p>

    <div class="checkboxes-wrapper" class="center">
        @foreach ($question->answers as $answer)

        @endforeach
    </div>

    <div class="center line"></div>
</div>