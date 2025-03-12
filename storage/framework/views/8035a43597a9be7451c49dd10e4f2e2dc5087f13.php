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
    }
    
    /* Navigation Bar */
    .navbar {
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 1rem 0;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 100;
    }
    
    .navbar-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }
    
    .navbar-logo {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }
    
    .logo-text {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary);
        margin: 0;
    }
    
    .navbar-menu {
        display: flex;
        list-style: none;
        gap: 2rem;
        margin: 0;
        padding: 0;
    }
    
    .navbar-item a {
        text-decoration: none;
        color: var(--dark);
        font-weight: 500;
        transition: color 0.3s ease;
        position: relative;
    }
    
    .navbar-item a:hover {
        color: var(--primary);
    }
    
    .navbar-item a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -5px;
        left: 0;
        background-color: var(--primary);
        transition: width 0.3s ease;
    }
    
    .navbar-item a:hover::after {
        width: 100%;
    }
    
    .navbar-buttons {
        display: flex;
        gap: 1rem;
    }
    
    .btn {
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .btn-primary {
        background-color: var(--primary);
        color: white;
        border: 2px solid var(--primary);
    }
    
    .btn-primary:hover {
        background-color: transparent;
        color: var(--primary);
    }
    
    .btn-outline {
        background-color: transparent;
        color: var(--primary);
        border: 2px solid var(--primary);
    }
    
    .btn-outline:hover {
        background-color: var(--primary);
        color: white;
    }
    
    .btn-danger {
        background-color: var(--danger);
        color: white;
        border: 2px solid var(--danger);
    }
    
    .btn-danger:hover {
        background-color: transparent;
        color: var(--danger);
    }
    
    /* Mobile menu toggle */
    .menu-toggle {
        display: none;
        flex-direction: column;
        cursor: pointer;
    }
    
    .bar {
        width: 25px;
        height: 3px;
        background-color: var(--dark);
        margin: 3px 0;
        transition: 0.4s;
    }
    
    /* Hero Section */
    .hero {
        margin-top: 80px;
        padding: 6rem 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: calc(100vh - 80px);
        background: linear-gradient(135deg, #f6f8ff 0%, #eef2ff 100%);
        position: relative;
        overflow: hidden;
    }
    
    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 10% 20%, rgba(108, 99, 255, 0.05) 0%, transparent 20%),
            radial-gradient(circle at 80% 80%, rgba(255, 101, 132, 0.05) 0%, transparent 20%);
    }
    
    .hero-container {
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
        z-index: 1;
    }
    
    .hero-subtitle {
        color: var(--primary);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 1rem;
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        color: var(--dark);
    }
    
    .hero-description {
        font-size: 1.2rem;
        max-width: 600px;
        margin-bottom: 2.5rem;
        color: #4a5568;
    }
    
    .hero-buttons {
        display: flex;
        gap: 1rem;
    }
    
    .btn-large {
        padding: 1rem 2.5rem;
        font-size: 1.1rem;
    }
    
    .features {
        padding: 4rem 2rem;
        background-color: white;
    }
    
    .features-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .features-title {
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .features-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }
    
    .feature-card {
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
        background-color: white;
        text-align: center;
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
    }
    
    .feature-icon {
        margin-bottom: 1.5rem;
        color: var(--primary);
        font-size: 2.5rem;
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
        .features-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 768px) {
        .navbar-menu {
            position: fixed;
            top: 60px;
            left: -100%;
            flex-direction: column;
            width: 100%;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0 10px 27px rgba(0, 0, 0, 0.05);
            background-color: white;
            padding: 2rem 0;
            gap: 1.5rem;
        }
        
        .navbar-menu.active {
            left: 0;
        }
        
        .menu-toggle {
            display: flex;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .features-grid {
            grid-template-columns: 1fr;
        }
        
        .hero-buttons {
            flex-direction: column;
        }
    }
</style>

<!-- Navigation Bar -->
<nav class="navbar">
    <div class="navbar-container">
        <a href="<?php echo e(route('home')); ?>" class="navbar-logo">
            <span class="logo-text">Mister Quiz</span>
        </a>
        
        <ul class="navbar-menu" id="navMenu">
            <li class="navbar-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="navbar-item"><a href="">Categories</a></li>
            <li class="navbar-item"><a href="">Leaderboard</a></li>
            <li class="navbar-item"><a href="">About</a></li>
        </ul>
        
        <div class="navbar-buttons">
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('profile')); ?>" class="btn btn-outline"><?php echo e(auth()->user()->username); ?></a>
                <a href="<?php echo e(route('logout')); ?>" class="btn btn-danger">Logout</a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Login</a>
            <?php endif; ?>
        </div>
        
        <div class="menu-toggle" id="mobileMenu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <p class="hero-subtitle">Test Your Knowledge</p>
        <h1 class="hero-title">Challenge Yourself With Exciting Quizzes</h1>
        <p class="hero-description">Join thousands of quiz enthusiasts and put your knowledge to the test with our diverse range of topics and difficulty levels.</p>
        <div class="hero-buttons">
            <a href="" class="btn btn-primary btn-large">Start Quiz</a>
            <a href="" class="btn btn-outline btn-large">View Categories</a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="features-container">
        <h2 class="features-title">Why Choose Our Quiz Platform?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>Diverse Categories</h3>
                <p>Choose from multiple categories including science, history, pop culture, and more.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🏆</div>
                <h3>Compete Globally</h3>
                <p>Challenge players worldwide and climb the leaderboard rankings.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📱</div>
                <h3>Play Anywhere</h3>
                <p>Our responsive design works perfectly on desktop, tablet, and mobile devices.</p>
            </div>
        </div>
    </div>
</section>

<script>
    // Mobile menu toggle
    document.getElementById('mobileMenu').addEventListener('click', function() {
        document.getElementById('navMenu').classList.toggle('active');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/faguenouz/Desktop/zone01/github/mister-quiz/resources/views/home.blade.php ENDPATH**/ ?>