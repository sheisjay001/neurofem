<?php require VIEW_PATH . '/layout/header.php'; ?>

<div class="container" style="max-width: 600px; padding-top: 60px; padding-bottom: 60px;">
    <div class="card">
        <h2 class="text-center" style="margin-bottom: 10px; color: var(--brand-primary);">Join NeuroFem</h2>
        <p class="text-center" style="margin-bottom: 30px; color: var(--text-secondary);">Create your safe space today.</p>
        
        <form method="POST" action="<?= BASE_URL ?>/auth/handle-signup">
            <input type="hidden" name="csrf_token" value="<?= \Helpers\Security::generateCsrfToken() ?>">

            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 8px; font-weight: 600;">Full Name</label>
                <input type="text" id="name" name="name" required style="width: 100%; padding: 12px; border: 2px solid #E0E0E0; border-radius: 8px; font-size: 1rem; background: var(--bg-primary); color: var(--text-primary);" placeholder="Jane Doe">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 8px; font-weight: 600;">Email Address</label>
                <input type="email" id="email" name="email" required style="width: 100%; padding: 12px; border: 2px solid #E0E0E0; border-radius: 8px; font-size: 1rem; background: var(--bg-primary); color: var(--text-primary);" placeholder="you@example.com">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 8px; font-weight: 600;">Password</label>
                <input type="password" id="password" name="password" required style="width: 100%; padding: 12px; border: 2px solid #E0E0E0; border-radius: 8px; font-size: 1rem; background: var(--bg-primary); color: var(--text-primary);">
                <!-- Strength Meter -->
                <div class="password-strength-meter" style="margin-top: 10px; display: none;">
                    <div class="strength-bar-bg" style="height: 4px; background: #e0e0e0; border-radius: 2px;">
                        <div id="strength-bar" style="height: 100%; width: 0%; background: var(--error); transition: width 0.3s, background 0.3s; border-radius: 2px;"></div>
                    </div>
                    <div id="strength-text" style="font-size: 0.8rem; margin-top: 5px; color: var(--text-secondary);"></div>
                </div>
            </div>

            <div style="margin-bottom: 30px;">
                <label for="confirm_password" style="display: block; margin-bottom: 8px; font-weight: 600;">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required style="width: 100%; padding: 12px; border: 2px solid #E0E0E0; border-radius: 8px; font-size: 1rem; background: var(--bg-primary); color: var(--text-primary);">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Create Account</button>
        </form>

        <p class="text-center" style="margin-top: 20px;">
            Already have an account? <a href="<?= BASE_URL ?>/auth/login">Log In</a>
        </p>
    </div>
</div>

<?php require VIEW_PATH . '/layout/footer.php'; ?>
