<?php $__env->startSection('content'); ?>
<style>
    :root {
        --primary: #6c63ff;
        --secondary: #ff6584;
        --dark: #2d3748;
        --light: #f7fafc;
        --success: #48bb78;
        --warning: #ed8936;
        --danger: #e53e3e;
    }
    
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f7fa;
        color: var(--dark);
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    
    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .btn {
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
        background-color: var(--primary);
        color: white;
        border: 2px solid var(--primary);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn:hover {
        background-color: transparent;
        color: var(--primary);
    }
    
    .btn i {
        font-size: 1rem;
    }
    
    .main-img {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 1;
        text-align: center;
        padding: 2rem;
    }
    
    .title {
        font-size: 4rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 1.5rem;
    }
    
    .main-img img {
        max-width: 300px;
        margin-bottom: 3rem;
    }
</style>

<nav>
    <a class="btn" href="<?php echo e(route('leaderboard')); ?>"><i class="fas fa-medal"></i> Leaderboard</a>

    <div style="display: flex; gap: 30px">
        <?php if(auth()->guard()->check()): ?>
            <a class="btn" href="<?php echo e(route('profile')); ?>"><i class="fas fa-user"></i> <?php echo e(auth()->user()->username); ?></a>
        <?php endif; ?>

        <?php if(auth()->guard()->guest()): ?>
            <a class="btn" href="<?php echo e(route('login')); ?>"><i class="fas fa-right-to-bracket"></i> Login</a>
        <?php endif; ?>

        <?php if(auth()->guard()->check()): ?>
            <form action="<?php echo e(route('logout')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn"><i class="fas fa-right-from-bracket"></i> Logout</button>
            </form>
        <?php endif; ?>
    </div>
</nav>

<div class="main-img">
    <h1 class="title">Mister Quiz</h1>
    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Quiz Logo">

    <?php if(auth()->guard()->check()): ?>
        <a class="btn" style="margin-bottom:20px" href="<?php echo e(route('quiz')); ?>">Start Quiz <i class="fas fa-play"></i></a>
    <?php else: ?>
        <a class="btn" style="margin-bottom:20px" href="<?php echo e(route('login')); ?>">Login to Start Quiz <i class="fas fa-play"></i></a>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/faguenouz/Desktop/zone01/github/mister-quiz/resources/views/home.blade.php ENDPATH**/ ?>