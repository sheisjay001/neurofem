<?php require_once 'layout/header.php'; ?>

<div class="container" style="padding-top: var(--spacing-lg); max-width: 600px;">
    <div class="card">
        <h1><?= \Helpers\Icon::get('user') ?> My Profile</h1>
        <p class="text-secondary">Manage your account settings.</p>

        <?php if (isset($user)): ?>
            <form action="<?= BASE_URL ?>/profile/update" method="POST" class="form-group" style="margin-top: 20px;">
                <input type="hidden" name="csrf_token" value="<?= \Helpers\Security::generateCsrfToken() ?>">
                
                <div class="input-group">
                    <label for="email">Email (Cannot be changed)</label>
                    <input type="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" disabled style="background: var(--bg-secondary); cursor: not-allowed;">
                </div>

                <div class="input-group">
                    <label for="name">Display Name</label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>

            <hr style="margin: 30px 0; border: 0; border-top: 1px solid var(--border-color);">

            <div class="danger-zone">
                <h3><?= \Helpers\Icon::get('alert-triangle') ?> Danger Zone</h3>
                <p>Once you delete your account, there is no going back. Please be certain.</p>
                
                <form action="<?= BASE_URL ?>/profile/delete" method="POST" onsubmit="return confirm('Are you absolutely sure you want to delete your account? This action cannot be undone.');">
                    <input type="hidden" name="csrf_token" value="<?= \Helpers\Security::generateCsrfToken() ?>">
                    <button type="submit" class="btn btn-outline" style="color: var(--error); border-color: var(--error);">Delete Account</button>
                </form>
            </div>
        <?php else: ?>
            <p>Error loading profile.</p>
        <?php endif; ?>
    </div>
</div>

<style>
    .danger-zone {
        background: #fff5f5;
        padding: 20px;
        border-radius: var(--radius-md);
        border: 1px solid #ffcdd2;
    }
    .danger-zone h3 { color: var(--error); margin-top: 0; }
    
    /* Dark mode adjustment for danger zone */
    [data-theme="dark"] .danger-zone {
        background: #2a0a0a;
        border-color: #5c1b1b;
    }
</style>

<?php require_once 'layout/footer.php'; ?>
