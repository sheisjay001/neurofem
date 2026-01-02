<?php require_once 'layout/header.php'; ?>

<div class="container" style="padding-top: var(--spacing-lg);">
    <div class="resources-header">
        <h1><?= \Helpers\Icon::get('book') ?> Resource Library</h1>
        <p class="subtitle">Curated tools, guides, and strategies for your journey.</p>
        <div class="search-box">
            <input type="text" id="resource-search" placeholder="Search resources (e.g., 'burnout', 'career')..." aria-label="Search resources">
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="filter-bar">
        <button class="btn btn-outline active" data-filter="all">All Resources</button>
        <button class="btn btn-outline" data-filter="work"><?= \Helpers\Icon::get('briefcase') ?> Work & Career</button>
        <button class="btn btn-outline" data-filter="health"><?= \Helpers\Icon::get('heart') ?> Health & Self-Care</button>
        <button class="btn btn-outline" data-filter="social"><?= \Helpers\Icon::get('users') ?> Relationships</button>
        <button class="btn btn-outline" data-filter="tools"><?= \Helpers\Icon::get('tool') ?> Tools & Tech</button>
        <button class="btn btn-outline" data-filter="legal"><?= \Helpers\Icon::get('scale') ?> Rights & Advocacy</button>
    </div>

    <div class="resources-grid" id="resources-grid">
        <?php foreach ($resources as $res): ?>
            <div class="card resource-card" data-category="<?= $res['category'] ?>" data-title="<?= strtolower($res['title']) ?>" data-desc="<?= strtolower($res['desc']) ?>">
                <div class="card-header">
                    <div class="res-icon">
                        <?php 
                            switch($res['category']) {
                                case 'work': echo \Helpers\Icon::get('briefcase'); break;
                                case 'health': echo \Helpers\Icon::get('heart'); break;
                                case 'social': echo \Helpers\Icon::get('users'); break;
                                case 'tools': echo \Helpers\Icon::get('tool'); break;
                                case 'legal': echo \Helpers\Icon::get('scale'); break;
                                default: echo \Helpers\Icon::get('file-text');
                            }
                        ?>
                    </div>
                    <?php if (!empty($res['tags'])): ?>
                        <div class="tags">
                            <?php foreach ($res['tags'] as $tag): ?>
                                <span class="tag"><?= htmlspecialchars($tag) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <h3><?= htmlspecialchars($res['title']) ?></h3>
                <p><?= htmlspecialchars($res['desc']) ?></p>
                <a href="<?= htmlspecialchars($res['link']) ?>" class="btn btn-sm btn-secondary stretched-link">Read Guide</a>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div id="no-results" style="display:none; text-align:center; margin-top: 30px;">
        <p>No resources found matching your criteria. Try a different search term.</p>
    </div>
</div>

<style>
    .resources-header {
        text-align: center;
        margin-bottom: var(--spacing-xl);
    }
    
    .subtitle {
        color: var(--text-secondary);
        font-size: 1.1rem;
        margin-bottom: var(--spacing-md);
    }

    .search-box {
        max-width: 500px;
        margin: 0 auto;
    }
    
    .search-box input {
        width: 100%;
        padding: 12px 20px;
        border-radius: 50px;
        border: 2px solid var(--border-color);
        font-size: 1rem;
        transition: border-color 0.3s;
    }
    
    .search-box input:focus {
        border-color: var(--brand-primary);
        outline: none;
        box-shadow: 0 0 0 3px rgba(69, 183, 209, 0.2);
    }

    .filter-bar {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: var(--spacing-xl);
        flex-wrap: wrap;
    }

    .filter-bar .btn.active {
        background-color: var(--brand-primary);
        color: white;
        border-color: var(--brand-primary);
    }

    .resources-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: var(--spacing-lg);
    }

    .resource-card {
        display: flex;
        flex-direction: column;
        align-items: start;
        transition: transform 0.2s, box-shadow 0.2s;
        height: 100%;
        position: relative; /* For stretched-link */
    }

    .resource-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }
    
    .card-header {
        display: flex;
        justify-content: space-between;
        width: 100%;
        align-items: flex-start;
        margin-bottom: 10px;
    }

    .res-icon {
        font-size: 2rem;
        background: var(--bg-secondary);
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
    }
    
    .tags {
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
        justify-content: flex-end;
    }
    
    .tag {
        font-size: 0.75rem;
        background: var(--brand-secondary);
        color: var(--text-primary);
        padding: 2px 8px;
        border-radius: 12px;
        font-weight: 600;
    }
    
    /* Make the whole card clickable */
    .stretched-link::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1;
        content: "";
    }
    
    /* Ensure relative positioning for stacking context */
    .resource-card {
        position: relative;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const filters = document.querySelectorAll('.filter-bar button');
    const cards = document.querySelectorAll('.resource-card');
    const searchInput = document.getElementById('resource-search');
    const noResults = document.getElementById('no-results');
    
    let currentFilter = 'all';
    let currentSearch = '';

    function filterResources() {
        let visibleCount = 0;
        
        cards.forEach(card => {
            const category = card.dataset.category;
            const title = card.dataset.title;
            const desc = card.dataset.desc;
            
            const matchesFilter = (currentFilter === 'all' || category === currentFilter);
            const matchesSearch = (title.includes(currentSearch) || desc.includes(currentSearch));
            
            if (matchesFilter && matchesSearch) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        if (visibleCount === 0) {
            noResults.style.display = 'block';
        } else {
            noResults.style.display = 'none';
        }
    }

    filters.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class
            filters.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            currentFilter = btn.dataset.filter;
            filterResources();
        });
    });
    
    searchInput.addEventListener('input', (e) => {
        currentSearch = e.target.value.toLowerCase();
        filterResources();
    });
});
</script>

<?php require_once 'layout/footer.php'; ?>
