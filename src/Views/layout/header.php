<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NeuroFem - Empowering Neurodivergent Women</title>
    <meta name="description" content="A world-class resource for neurodivergent women to navigate life with confidence.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="<?= (BASE_URL === '' ? '' : BASE_URL) ?>/assets/css/style.css">
    <!-- Scripts -->
    <script src="<?= (BASE_URL === '' ? '' : BASE_URL) ?>/assets/js/main.js" defer></script>
</head>
<body>
    <a href="#main-content" class="skip-link">Skip to main content</a>
    <header>
        <div id="mobile-menu-overlay" class="mobile-menu-overlay"></div>
        <div class="container">
            <nav>
                <a href="<?= isset($_SESSION['user_id']) ? BASE_URL . '/dashboard' : BASE_URL . '/' ?>" class="logo">
                    <!-- Simple SVG Logo Placeholder -->
                    <svg width="32" height="32" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="45" stroke="var(--brand-primary)" stroke-width="10"/>
                        <path d="M30 50 L50 70 L70 30" stroke="var(--brand-accent)" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span style="font-weight: 700; font-size: 1.25rem; letter-spacing: -0.02em; color: var(--text-primary);">NeuroFem</span>
                </a>
                
                <button id="mobile-menu-toggle" class="mobile-menu-toggle" aria-label="Toggle Navigation">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>

                <ul class="nav-links" id="nav-links">
                    <?php if (!isset($_SESSION['user_id'])): ?>
                        <li><a href="<?= BASE_URL ?>/">Home</a></li>
                        <li><a href="#features">Features</a></li>
                    <?php endif; ?>
                    
                    <li><a href="<?= BASE_URL ?>/resources">Resources</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="<?= BASE_URL ?>/community">Community</a></li>
                    <?php endif; ?>
                        <!-- Accessibility Toolbar -->
                    <li class="acc-menu-container">
                        <button id="acc-toggle" class="btn btn-outline" aria-label="Accessibility Settings" aria-expanded="false">
                            <span class="icon-wrapper"><?= \Helpers\Icon::get('settings') ?></span> A11y
                        </button>
                        <div id="acc-dropdown" class="acc-dropdown" hidden>
                            <div class="acc-group">
                                <label>Theme</label>
                                <div class="btn-group">
                                    <button data-set-theme="light" aria-label="Light Theme"><?= \Helpers\Icon::get('sun') ?></button>
                                    <button data-set-theme="dark" aria-label="Dark Theme"><?= \Helpers\Icon::get('moon') ?></button>
                                    <button data-set-theme="soft" aria-label="Soft Theme"><?= \Helpers\Icon::get('leaf') ?></button>
                                </div>
                            </div>
                            <div class="acc-group">
                                <label>Font</label>
                                <div class="btn-group">
                                    <button data-set-font="sans" aria-label="Default Font">Aa</button>
                                    <button data-set-font="dyslexic" aria-label="Dyslexia Friendly Font" style="font-family: 'OpenDyslexic', sans-serif;">Ab</button>
                                </div>
                            </div>
                            <div class="acc-group">
                                <label>Text Size</label>
                                <input type="range" id="font-size-slider" min="16" max="24" step="2" value="18" aria-label="Text Size">
                            </div>
                        </div>
                    </li>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="<?= BASE_URL ?>/profile" style="font-weight: bold; color: var(--text-primary);">Hi, <?= htmlspecialchars($_SESSION['user_name']) ?></a></li>
                        <li><a href="<?= BASE_URL ?>/dashboard" class="btn btn-primary">Dashboard</a></li>
                        <li><a href="<?= BASE_URL ?>/auth/logout" class="btn btn-secondary">Logout</a></li>
                    <?php else: ?>
                        <li><a href="<?= BASE_URL ?>/auth/login" class="btn btn-primary">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
    <main id="main-content">
