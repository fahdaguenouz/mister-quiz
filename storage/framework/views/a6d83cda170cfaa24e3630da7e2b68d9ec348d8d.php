<?php $__env->startSection('content'); ?>

<a class="top-right-corner red-btn" href="<?php echo e(route('home')); ?>">Back ></a>

<div style="margin-top:100px">
    <div class="profile-header">
        <p class="title profile-name"><?php echo e(auth()->user()->username); ?></p>
        <p class="title profile-email"><?php echo e(auth()->user()->email); ?></p>
    </div>

    <div class="profile-header">
        <p class="title profile-xp"><?php echo e(auth()->user()->xp); ?> XP</p>

    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/afonso/mister_quiz/resources/views/profile.blade.php ENDPATH**/ ?>