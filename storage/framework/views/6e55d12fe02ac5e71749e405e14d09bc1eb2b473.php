<?php $__env->startSection('content'); ?>

<?php if(auth()->guard()->check()): ?>
<a class="top-left-corner blue-btn" href="<?php echo e(route('profile')); ?>"><?php echo e(auth()->user()->username); ?></a>
<?php endif; ?>

<?php if(auth()->guard()->guest()): ?>
<a class="top-left-corner blue-btn" href="<?php echo e(route('login')); ?>">Login</a>

<?php endif; ?>

<a class="top-right-corner blue-btn" href="<?php echo e(route('leaderboard')); ?>">Leaderboard</a>

<?php if(auth()->guard()->check()): ?>
<a class="bottom-right-corner red-btn" href="<?php echo e(route('logout')); ?>">Logout</a>
<?php endif; ?>

<div class="main-img">
    <img src="<?php echo e(asset('images/mister_quiz.png')); ?>" alt="">
    <p class="title">Mister Quiz</p>

    <a style="margin-bottom:20px" class="green-btn center" href="<?php echo e(route('quiz')); ?>">Start Quiz</a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/afonso/mister_quiz/resources/views/home.blade.php ENDPATH**/ ?>