<?php $attributes = $attributes->exceptProps(['question'=>$question]); ?>
<?php foreach (array_filter((['question'=>$question]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="mb4">
    <p class="center title"><?php echo e($question->question); ?></p>

    <div class="checkboxes-wrapper" class="center">
        <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="checkbox">
            <label>
                <input name="<?php echo e($question->id); ?>" type="radio" value="<?php echo e($answer->answer); ?>" required>
                <span><?php echo e($answer -> answer); ?></span>

            </label>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="center line"></div>
</div><?php /**PATH /home/afonso/Documents/programming/PHP/projects/mister_quiz/resources/views/components/question.blade.php ENDPATH**/ ?>