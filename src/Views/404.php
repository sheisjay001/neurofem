<?php require_once 'layout/header.php'; ?>

<div class="container" style="text-align: center; padding: 100px 20px;">
    <h1 style="font-size: 6rem; margin: 0; color: var(--brand-secondary);">404</h1>
    <h2 style="margin-top: 0; color: var(--text-primary);">Page Not Found</h2>
    
    <p style="font-size: 1.2rem; color: var(--text-secondary); max-width: 600px; margin: 20px auto;">
        It looks like you've wandered into uncharted territory. That's okay! 
        Let's get you back to a familiar place.
    </p>

    <div style="margin-top: 40px;">
        <a href="<?= BASE_URL ?>/" class="btn btn-primary">Go Home</a>
        <a href="<?= BASE_URL ?>/dashboard" class="btn btn-outline" style="margin-left: 10px;">My Dashboard</a>
    </div>

    <div style="margin-top: 60px; opacity: 0.6;">
        <svg width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
            <line x1="9" y1="9" x2="9.01" y2="9"></line>
            <line x1="15" y1="9" x2="15.01" y2="9"></line>
        </svg>
    </div>

    <!-- Debug Info for Vercel Troubleshooting -->
    <?php if (isset($_GET['debug']) || true): // Always show for now until fixed ?>
    <div style="margin-top: 40px; padding: 20px; background: #f0f0f0; border-radius: 8px; text-align: left; font-family: monospace; font-size: 0.8rem; overflow: auto;">
        <h3 style="margin-top: 0;">Debug Info</h3>
        <p><strong>Request URI:</strong> <?= htmlspecialchars($_SERVER['REQUEST_URI'] ?? 'N/A') ?></p>
        <p><strong>Script Name:</strong> <?= htmlspecialchars($_SERVER['SCRIPT_NAME'] ?? 'N/A') ?></p>
        <p><strong>Processed Request:</strong> <?= htmlspecialchars($GLOBALS['request'] ?? 'N/A') ?></p>
        <p><strong>Controller:</strong> <?= htmlspecialchars($GLOBALS['controllerName'] ?? 'N/A') ?></p>
        <p><strong>Action:</strong> <?= htmlspecialchars($GLOBALS['actionName'] ?? 'N/A') ?></p>
        <p><strong>Base URL:</strong> <?= htmlspecialchars(BASE_URL) ?></p>
        <p><strong>Root Path:</strong> <?= htmlspecialchars(ROOT_PATH) ?></p>
        <p><strong>Src Path:</strong> <?= htmlspecialchars(SRC_PATH) ?></p>
        <p><strong>Attempted Autoload:</strong> <?= htmlspecialchars($GLOBALS['controllerName'] ?? 'N/A') ?></p>
    </div>
    <?php endif; ?>
</div>

<?php require_once 'layout/footer.php'; ?>
