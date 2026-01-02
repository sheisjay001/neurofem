<?php require_once 'layout/header.php'; ?>

<div class="container" style="padding-top: var(--spacing-lg);">
    <a href="<?= BASE_URL ?>/resources" class="back-link">← Back to Resources</a>
    
    <article class="resource-detail card">
        <div class="article-header">
            <span class="category-badge category-<?= $resource['category'] ?>">
                <?php 
                    switch($resource['category']) {
                        case 'work': echo \Helpers\Icon::get('briefcase') . ' Work & Career'; break;
                        case 'health': echo \Helpers\Icon::get('heart') . ' Health & Self-Care'; break;
                        case 'social': echo \Helpers\Icon::get('users') . ' Relationships'; break;
                        case 'tools': echo \Helpers\Icon::get('tool') . ' Tools & Tech'; break;
                        case 'legal': echo \Helpers\Icon::get('scale') . ' Rights & Advocacy'; break;
                        default: echo \Helpers\Icon::get('file-text') . ' Article';
                    }
                ?>
            </span>
            <h1><?= htmlspecialchars($resource['title']) ?></h1>
            <div class="tags">
                <?php foreach ($resource['tags'] as $tag): ?>
                    <span class="tag"><?= htmlspecialchars($tag) ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="article-content">
            <?= $resource['content'] ?>
        </div>
    </article>
</div>

<style>
    .back-link {
        display: inline-block;
        margin-bottom: var(--spacing-md);
        font-weight: 600;
        color: var(--text-secondary);
    }
    
    .back-link:hover {
        color: var(--brand-primary);
        text-decoration: none;
        transform: translateX(-5px);
    }

    .resource-detail {
        max-width: 800px;
        margin: 0 auto 60px;
        padding: 40px;
    }

    .article-header {
        margin-bottom: 40px;
        border-bottom: 1px solid var(--border-color);
        padding-bottom: 20px;
    }

    .category-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: bold;
        margin-bottom: 15px;
        background: var(--bg-secondary);
        color: var(--text-secondary);
    }

    .article-header h1 {
        font-size: 2.5rem;
        margin: 10px 0 20px;
        line-height: 1.2;
        color: var(--brand-primary);
    }

    .tags {
        display: flex;
        gap: 10px;
    }

    .tag {
        background: var(--brand-secondary);
        color: var(--text-primary);
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        opacity: 0.8;
    }

    .article-content {
        line-height: 1.8;
        font-size: 1.1rem;
    }

    .article-content h2 {
        color: var(--brand-primary);
        margin-top: 40px;
        margin-bottom: 20px;
        font-size: 1.8rem;
    }

    .article-content h3 {
        color: var(--text-secondary);
        margin-top: 30px;
        margin-bottom: 15px;
        font-size: 1.4rem;
    }

    .article-content ul {
        padding-left: 20px;
        margin-bottom: 20px;
    }

    .article-content li {
        margin-bottom: 10px;
    }

    .article-content p {
        margin-bottom: 20px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .resource-detail {
            padding: 20px;
        }
        
        .article-header h1 {
            font-size: 2rem;
        }
    }
</style>

<?php require_once 'layout/footer.php'; ?>
