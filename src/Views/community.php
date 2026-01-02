<?php require_once 'layout/header.php'; ?>

<div class="container" style="padding-top: var(--spacing-lg);">
    <div class="community-header">
        <h1><?= \Helpers\Icon::get('message-circle') ?> Safe Space Community</h1>
        <p>A judgment-free zone to share, vent, and connect.</p>
    </div>

    <div class="community-layout">
        <!-- Sidebar -->
        <div class="community-sidebar">
            <div class="card">
                <h3>Community Guidelines</h3>
                <ul class="guidelines-list">
                    <li><?= \Helpers\Icon::get('heart') ?> Be kind and supportive.</li>
                    <li><?= \Helpers\Icon::get('slash') ?> No hate speech or bullying.</li>
                    <li><?= \Helpers\Icon::get('eye-off') ?> Respect privacy.</li>
                    <li><?= \Helpers\Icon::get('alert-triangle') ?> Use content warnings if needed.</li>
                </ul>
            </div>
        </div>

        <!-- Feed -->
        <div class="community-feed">
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="card create-post-card">
                    <form action="<?= BASE_URL ?>/community/create" method="POST">
                        <input type="hidden" name="csrf_token" value="<?= \Helpers\Security::generateCsrfToken() ?>">
                        <textarea name="content" placeholder="What's on your mind? (This is a safe space...)" required aria-label="Create a post"></textarea>
                        
                        <div class="post-actions">
                            <select name="category" aria-label="Post Category">
                                <option value="general">General</option>
                                <option value="vent">Vent / Rant</option>
                                <option value="celebration">Celebration</option>
                                <option value="question">Question</option>
                                <option value="advice">Seeking Advice</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                <div class="card text-center">
                    <p>Please <a href="<?= BASE_URL ?>/auth/login">Login</a> to join the conversation.</p>
                </div>
            <?php endif; ?>

            <div class="posts-list">
                <?php if (empty($posts)): ?>
                    <div class="empty-state">
                        <p>No posts yet. Be the first to share!</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                        <div class="card post-item">
                            <div class="post-header">
                                <span class="author-name"><?= htmlspecialchars($post['user_name']) ?></span>
                                <span class="post-meta">
                                    <span class="badge badge-<?= $post['category'] ?>"><?= ucfirst($post['category']) ?></span>
                                    • <?= date('M d, H:i', strtotime($post['created_at'])) ?>
                                </span>
                            </div>
                            <div class="post-content">
                                <?= nl2br(htmlspecialchars($post['content'])) ?>
                            </div>
                            <div class="post-footer">
                                <button class="btn-text"><?= \Helpers\Icon::get('heart') ?> Like</button>
                                <button class="btn-text"><?= \Helpers\Icon::get('message-circle') ?> Reply</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
    .community-layout {
        display: grid;
        grid-template-columns: 250px 1fr;
        gap: var(--spacing-lg);
    }

    @media (max-width: 768px) {
        .community-layout {
            grid-template-columns: 1fr;
        }
        .community-sidebar {
            order: 2;
        }
    }

    .community-header {
        text-align: center;
        margin-bottom: var(--spacing-xl);
    }

    .guidelines-list {
        padding-left: 20px;
        color: var(--text-secondary);
    }

    .guidelines-list li { margin-bottom: 5px; }

    .create-post-card textarea {
        width: 100%;
        min-height: 100px;
        border: 1px solid var(--border-color, #ccc);
        border-radius: var(--radius-md);
        padding: 10px;
        font-family: var(--font-main);
        resize: vertical;
        margin-bottom: 10px;
    }

    .post-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .post-item {
        margin-bottom: var(--spacing-md);
    }

    .post-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 0.9rem;
    }

    .author-name {
        font-weight: bold;
        color: var(--brand-primary);
    }

    .post-meta {
        color: var(--text-secondary);
        font-size: 0.8rem;
    }

    .badge {
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 0.75rem;
        background: var(--bg-secondary);
    }

    .badge-vent { background: #ffebee; color: #c62828; }
    .badge-celebration { background: #e8f5e9; color: #2e7d32; }
    .badge-question { background: #e3f2fd; color: #1565c0; }

    .post-footer {
        margin-top: 15px;
        padding-top: 10px;
        border-top: 1px solid var(--bg-secondary);
    }

    .btn-text {
        background: none;
        border: none;
        cursor: pointer;
        color: var(--text-secondary);
        font-weight: 600;
        margin-right: 15px;
    }
    
    .btn-text:hover { color: var(--brand-primary); }
</style>

<?php require_once 'layout/footer.php'; ?>
