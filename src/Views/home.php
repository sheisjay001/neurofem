<?php require VIEW_PATH . '/layout/header.php'; ?>

<section class="hero">
    <div class="container">
        <h1>Navigate Life on Your Terms</h1>
        <p>A world-class sanctuary for neurodivergent women. Discover tools and community designed for the way your mind works.</p>
        <div style="margin-top: var(--spacing-lg);">
            <a href="<?= BASE_URL ?>/auth/signup" class="btn btn-primary btn-lg">Join Our Community</a>
            <a href="#features" class="btn btn-outline btn-lg" style="margin-left: 10px;">Explore Features</a>
        </div>
    </div>
</section>

<div class="container">
    <section id="features" class="features">
        <div class="card">
            <h3><?= \Helpers\Icon::get('leaf') ?> Sensory-Safe Design</h3>
            <p>Our platform is built with you in mind. Calm colors, clear typography, and a distraction-free interface to help you focus on what matters.</p>
        </div>
        <div class="card">
            <h3><?= \Helpers\Icon::get('users') ?> Authentic Community</h3>
            <p>Connect with women who "get it". A safe, moderated space to share experiences, ask questions, and build lasting friendships.</p>
        </div>
    </section>

    <section class="mb-lg" style="padding: var(--spacing-xl) 0;">
        <h2 class="text-center">Why NeuroFem?</h2>
        <div style="margin-top: 30px; max-width: 800px; margin-left: auto; margin-right: auto; text-align: center;">
            <p style="font-size: 1.1rem; color: var(--text-secondary); margin-bottom: 30px;">
                Navigating a world built for neurotypical brains can be exhausting. NeuroFem exists to bridge that gap with tools that actually work for you.
            </p>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; text-align: left;">
                <div class="card" style="padding: 20px;">
                    <h4 style="margin-bottom: 10px; color: var(--brand-primary);"><?= \Helpers\Icon::get('check') ?> Executive Function</h4>
                    <p style="margin: 0; font-size: 0.95rem;">Tools and templates designed to help you manage tasks without overwhelm.</p>
                </div>
                <div class="card" style="padding: 20px;">
                    <h4 style="margin-bottom: 10px; color: var(--brand-primary);"><?= \Helpers\Icon::get('briefcase') ?> Career Support</h4>
                    <p style="margin: 0; font-size: 0.95rem;">Advice on navigating the workplace, accommodations, and burnout.</p>
                </div>
                <div class="card" style="padding: 20px;">
                    <h4 style="margin-bottom: 10px; color: var(--brand-primary);"><?= \Helpers\Icon::get('heart') ?> Lifestyle & Health</h4>
                    <p style="margin: 0; font-size: 0.95rem;">Sensory-friendly tips and self-care strategies for maintenance.</p>
                </div>
                <div class="card" style="padding: 20px;">
                    <h4 style="margin-bottom: 10px; color: var(--brand-primary);"><?= \Helpers\Icon::get('message-circle') ?> Global Advocacy</h4>
                    <p style="margin: 0; font-size: 0.95rem;">Resources connecting you to advocacy groups on every continent.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-lg" id="get-started" style="background: var(--bg-secondary); padding: var(--spacing-xl); border-radius: var(--radius-lg); text-align: center; margin-bottom: var(--spacing-2xl);">
        <h2 style="margin-bottom: 10px;">Start Your Journey Today</h2>
        <p style="margin-bottom: 30px; color: var(--text-secondary);">Join a community that understands you. It's free, private, and secure.</p>
        <div>
            <a href="<?= BASE_URL ?>/auth/signup" class="btn btn-primary btn-lg">Get Started</a>
            <a href="<?= BASE_URL ?>/auth/login" class="btn btn-outline btn-lg" style="margin-left: 10px;">Log In</a>
        </div>
    </section>
</div>

<?php require VIEW_PATH . '/layout/footer.php'; ?>
