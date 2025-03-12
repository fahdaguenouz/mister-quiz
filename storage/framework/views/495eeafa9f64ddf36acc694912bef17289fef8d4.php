<?php $__env->startSection('content'); ?>

<a class="top-right-corner red-btn" href="<?php echo e(route('home')); ?>">Back ></a>

<div style="margin-top:100px">
    <div class="profile-header">
        <p class="title profile-name"><?php echo e(auth()->user()->username); ?></p>
        <p class="title profile-email"><?php echo e(auth()->user()->email); ?></p>
    </div>

    <div class="profile-header">
        <p class="title profile-xp"><?php echo e(auth()->user()->xp); ?> XP</p>

        <?php if(auth()->user()->xp < 1500): ?> <p class="title profile-rank green">Quiz Aprentice</p>
            <?php elseif(auth()->user()->xp >= 1500 && auth()->user()->xp < 5000): ?> <p class="title profile-rank yellow">Average Quizer</p>
                <?php elseif(auth()->user()->xp>= 5000 && auth()->user()->xp < 10000): ?> <p class="title profile-rank red">Epic Quizer</p>
                    <?php else: ?>
                    <p class="title profile-rank purple">Quiz Master</p>
                    <?php endif; ?>

    </div>
</div>

<div class="center">
    <div class="results-wrapper">
        <div class="result">
            <p class="center">Art</p>
            <p class="title"><?php echo e($art[0]); ?> %</p>

            <div>
                <div class="answers-stats">
                    <p>Correct Answers</p>
                    <p><?php echo e($art[1]); ?></p>
                </div>
                <div class="answers-stats">
                    <p>Total Answers</p>
                    <p><?php echo e($art[2]); ?></p>
                </div>
            </div>
        </div>
        <div class="result">
            <p class="center">Geography</p>
            <p class="title"><?php echo e($geography[0]); ?> %</p>

            <div>
                <div class="answers-stats">
                    <p>Correct Answers</p>
                    <p><?php echo e($geography[1]); ?></p>
                </div>
                <div class="answers-stats">
                    <p>Total Answers</p>
                    <p><?php echo e($geography[2]); ?></p>
                </div>
            </div>
        </div>
        <div class="result">
            <p class="center">History</p>
            <p class="title"><?php echo e($history[0]); ?> %</p>

            <div>
                <div class="answers-stats">
                    <p>Correct Answers</p>
                    <p><?php echo e($history[1]); ?></p>
                </div>
                <div class="answers-stats">
                    <p>Total Answers</p>
                    <p><?php echo e($history[2]); ?></p>
                </div>
            </div>
        </div>
        <div class="result">
            <p class="center">Science</p>
            <p class="title"><?php echo e($science[0]); ?> %</p>

            <div>
                <div class="answers-stats">
                    <p>Correct Answers</p>
                    <p><?php echo e($science[1]); ?></p>
                </div>
                <div class="answers-stats">
                    <p>Total Answers</p>
                    <p><?php echo e($science[2]); ?></p>
                </div>
            </div>
        </div>
        <div class="result">
            <p class="center">Sports</p>
            <p class="title"><?php echo e($sports[0]); ?> %</p>

            <div>
                <div class="answers-stats">
                    <p>Correct Answers</p>
                    <p><?php echo e($sports[1]); ?></p>
                </div>
                <div class="answers-stats">
                    <p>Total Answers</p>
                    <p><?php echo e($sports[2]); ?></p>
                </div>
            </div>
        </div>

    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/afonso/Documents/programming/PHP/projects/mister_quiz/resources/views/profile.blade.php ENDPATH**/ ?>