<?php $__env->startSection('content'); ?>

<a class="top-right-corner red-btn" href="<?php echo e(route('home')); ?>">Back ></a>

<div>
    <div>
        <p class="title form-header">Login form</p>
    </div>

    <form action="<?php echo e(route('login')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb4">
            <input class="auth-input center" type="text" name="email" id="email" placeholder="Enter email" value="<?php echo e(old('email')); ?>">

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="center error-msg mt2">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb4">
            <input class="auth-input center" type="password" name="password" id="password" placeholder="Enter password">

            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="center error-msg mt2">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button class="center green-btn mb4" style="cursor: pointer;" type="submit">Login</button>
        <?php if(session('status')): ?>
        <div class="center error-msg mt2">
            <?php echo e(session('status')); ?>

        </div>
        <?php endif; ?>
        <a class="center simple-link mt2" href="<?php echo e(route('register')); ?>">Don't have an account? Register</a>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/afonso/mister_quiz/resources/views/auth/login.blade.php ENDPATH**/ ?>