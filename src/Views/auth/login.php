<?php require VIEW_PATH . '/layout/header.php'; ?>

<div class="container" style="max-width: 500px; padding-top: 60px; padding-bottom: 60px;">
    <div class="card">
        <h2 class="text-center" style="margin-bottom: 30px; color: var(--brand-primary);">Welcome Back</h2>
        
        <form method="POST" action="<?= BASE_URL ?>/auth/handle-login">
            <input type="hidden" name="csrf_token" value="<?= \Helpers\Security::generateCsrfToken() ?>">
            
            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 8px; font-weight: 600;">Email Address</label>
                <input type="email" id="email" name="email" required style="width: 100%; padding: 12px; border: 2px solid #E0E0E0; border-radius: 8px; font-size: 1rem; background: var(--bg-primary); color: var(--text-primary);" placeholder="you@example.com">
            </div>

            <div style="margin-bottom: 30px;">
                <label for="password" style="display: block; margin-bottom: 8px; font-weight: 600;">Password</label>
                <input type="password" id="password" name="password" required style="width: 100%; padding: 12px; border: 2px solid #E0E0E0; border-radius: 8px; font-size: 1rem; background: var(--bg-primary); color: var(--text-primary);">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Log In</button>
        </form>

        <p class="text-center" style="margin-top: 20px;">
            Don't have an account? <a href="<?= BASE_URL ?>/auth/signup">Sign Up</a>
        </p>
    </div>
</div>

<?php require VIEW_PATH . '/layout/footer.php'; ?>
