<aside class="sidebar-menu">
    <nav class="sidebar-nav">
        <ul>
            <li>
                <a href="<?= BASE_URL ?>/dashboard" class="<?= strpos($_SERVER['REQUEST_URI'], '/dashboard') !== false ? 'active' : '' ?>">
                    <?= \Helpers\Icon::get('grid') ?> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/focus" class="<?= strpos($_SERVER['REQUEST_URI'], '/focus') !== false ? 'active' : '' ?>">
                    <?= \Helpers\Icon::get('clock') ?> <span>Focus Room</span>
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/community" class="<?= strpos($_SERVER['REQUEST_URI'], '/community') !== false ? 'active' : '' ?>">
                    <?= \Helpers\Icon::get('message-circle') ?> <span>Community</span>
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/resources" class="<?= strpos($_SERVER['REQUEST_URI'], '/resources') !== false ? 'active' : '' ?>">
                    <?= \Helpers\Icon::get('book') ?> <span>Resources</span>
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL ?>/profile" class="<?= strpos($_SERVER['REQUEST_URI'], '/profile') !== false ? 'active' : '' ?>">
                    <?= \Helpers\Icon::get('user') ?> <span>Profile</span>
                </a>
            </li>
        </ul>
        
        <div class="sidebar-footer">
            <a href="<?= BASE_URL ?>/auth/logout" class="btn-logout">
                <?= \Helpers\Icon::get('log-out') ?> <span>Logout</span>
            </a>
        </div>
    </nav>
</aside>