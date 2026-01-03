<?php require_once 'layout/header.php'; ?>

<div class="container" style="padding-top: var(--spacing-xl); padding-bottom: var(--spacing-xl);">
    <div class="hero-section" style="text-align: center; margin-bottom: var(--spacing-xl);">
        <h1>About NeuroFem</h1>
        <p class="subtitle" style="max-width: 700px; margin: 0 auto;">Empowering neurodivergent women through community, resources, and safe spaces.</p>
    </div>

    <div class="grid-layout" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: var(--spacing-lg); margin-bottom: var(--spacing-xl);">
        <div class="card">
            <h3>Our Mission</h3>
            <p>NeuroFem is dedicated to creating a supportive digital environment for women with ADHD, Autism, and other neurodivergent conditions. We believe in the power of shared experiences and accessible tools to help navigate a world not always designed for us.</p>
        </div>
        <div class="card">
            <h3>Why We Exist</h3>
            <p>Neurodivergent women often face unique challenges that are overlooked. From late diagnosis to workplace struggles and sensory overload, we provide a space where you don't have to mask or explain yourself—you just belong.</p>
        </div>
    </div>

    <div class="card" style="margin-bottom: var(--spacing-xl);">
        <h3>What We Offer</h3>
        <ul style="list-style: none; padding: 0; margin-top: var(--spacing-md);">
            <li style="margin-bottom: var(--spacing-sm); display: flex; align-items: center; gap: 10px;">
                <?= \Helpers\Icon::get('message-circle') ?>
                <span><strong>Community:</strong> Connect with others who understand your journey.</span>
            </li>
            <li style="margin-bottom: var(--spacing-sm); display: flex; align-items: center; gap: 10px;">
                <?= \Helpers\Icon::get('book') ?>
                <span><strong>Resources:</strong> Curated articles, tips, and strategies for daily life.</span>
            </li>
            <li style="margin-bottom: var(--spacing-sm); display: flex; align-items: center; gap: 10px;">
                <?= \Helpers\Icon::get('clock') ?>
                <span><strong>Focus Room:</strong> A distraction-free zone with Pomodoro timers to help you get things done.</span>
            </li>
            <li style="margin-bottom: var(--spacing-sm); display: flex; align-items: center; gap: 10px;">
                <?= \Helpers\Icon::get('leaf') ?>
                <span><strong>Wellness:</strong> Tools to track your mood and energy levels.</span>
            </li>
        </ul>
    </div>

    <div style="text-align: center; margin-top: var(--spacing-xl);">
        <h3>Join the Conversation</h3>
        <p style="margin-bottom: var(--spacing-md);">Ready to be part of a community that gets it?</p>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="<?= BASE_URL ?>/auth/signup" class="btn btn-primary">Join Community</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>/community" class="btn btn-primary">Go to Community</a>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>
