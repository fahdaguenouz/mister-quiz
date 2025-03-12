<?php $__env->startSection('content'); ?>

<a class="top-left-corner blue-btn" href="<?php echo e(route('profile')); ?>"> <?php echo e(auth()->user()->username); ?> </a>

<a class="top-right-corner blue-btn" href="<?php echo e(route('home')); ?>">
    < Home</a>

        <div class="center text-center content">
            <div>
                <p class="title">Your score was</p>
                <p class="title" style="font-size:70px; font-style:bold;">
                    <?php echo e($results['overall']); ?> / 20
                </p>
            </div>

            <div class="results-wrapper">
                <div class="result">
                    <p>Art</p>
                    <p class="title"><?php echo e($results['art']); ?> / 4</p>
                </div>
                <div class="result">
                    <p>Geography</p>
                    <p class="title"><?php echo e($results['geography']); ?> / 4</p>
                </div>
                <div class="result">
                    <p>History</p>
                    <p class="title"><?php echo e($results['history']); ?> / 4</p>
                </div>
                <div class="result">
                    <p>Science</p>
                    <p class="title"><?php echo e($results['science']); ?> / 4</p>
                </div>
                <div class="result">
                    <p>Sports</p>
                    <p class="title"><?php echo e($results['sports']); ?> / 4</p>
                </div>

            </div>
        </div>

        <?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/afonso/Documents/programming/PHP/projects/mister_quiz/resources/views/questions/results.blade.php ENDPATH**/ ?>