<?php $__env->startSection('content'); ?>

<a class="top-right-corner red-btn" href="<?php echo e(route('home')); ?>">Back ></a>

<div>
    <div>
        <p class="title form-header">Register form</p>
    </div>

    <form action="<?php echo e(route('register')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb4">
            <input class="center auth-input" type="text" name="username" id="username" placeholder="Enter username" value="<?php echo e(old('username')); ?>">

            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="error-msg mt2 center">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb4">
            <input class="center auth-input" type="text" name="email" id="email" placeholder="Enter email" value="<?php echo e(old('email')); ?>">

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="error-msg mt2 center">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb4">
            <input class="center auth-input" type="password" name="password" id="password" placeholder="Enter password">

            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class=" error-msg mt2 center">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="mb4">
            <input class="center auth-input" type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter password confirmation">

            <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="error-msg mt2 center">
                <?php echo e($message); ?>

            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button class="center green-btn mb4" style="cursor: pointer;" type="submit">Register</button>

        <a class="center simple-link" href="<?php echo e(route('login')); ?>">Already have an account? Login</a>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/afonso/Documents/programming/PHP/projects/mister_quiz/resources/views/auth/register.blade.php ENDPATH**/ ?>