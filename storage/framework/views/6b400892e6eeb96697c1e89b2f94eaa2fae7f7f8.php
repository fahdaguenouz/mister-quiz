<?php $__env->startSection('content'); ?>

<?php if($question): ?>
<?php echo e($question); ?>

<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/afonso/Documents/programming/PHP/projects/mister_quiz/resources/views/questions/question.blade.php ENDPATH**/ ?>