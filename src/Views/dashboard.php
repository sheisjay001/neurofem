<?php require_once 'layout/header.php'; ?>

<div class="container" style="padding-top: var(--spacing-lg);">
    <div class="dashboard-header">
        <h1>Welcome back, <?= htmlspecialchars($_SESSION['user_name']) ?>!</h1>
        <p class="subtitle">Here is your safe space to navigate and grow.</p>
        <?php if (!empty($message)): ?>
            <div class="alert success" style="background: var(--bg-secondary); border: 1px solid var(--success); color: var(--success); padding: 12px; border-radius: var(--radius-md); margin-top: 16px; font-weight: 500;">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="dashboard-grid">
        <!-- Mood / Status Check-in -->
        <div class="card mood-tracker">
            <h3><?= \Helpers\Icon::get('leaf') ?> How are you feeling today?</h3>
            <form method="POST" action="">
                <input type="hidden" name="log_mood" value="1">
                
                <div class="form-group">
                    <label>Mood Level (1-5)</label>
                    <div class="range-labels">
                        <span><?= \Helpers\Icon::get('frown') ?></span>
                        <span><?= \Helpers\Icon::get('meh') ?></span>
                        <span><?= \Helpers\Icon::get('smile') ?></span>
                    </div>
                    <input type="range" name="mood_level" min="1" max="5" value="3" class="slider mood-slider">
                </div>

                <div class="form-group">
                    <label>Energy Level (1-5)</label>
                    <div class="range-labels">
                        <span><?= \Helpers\Icon::get('battery') ?> Low</span>
                        <span><?= \Helpers\Icon::get('zap') ?> High</span>
                    </div>
                    <input type="range" name="energy_level" min="1" max="5" value="3" class="slider energy-slider">
                </div>

                <div class="form-group">
                    <label>Quick Note (Optional)</label>
                    <textarea name="note" rows="2" placeholder="What's on your mind?"></textarea>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Log Check-in</button>
            </form>
        </div>

        <!-- Recent History -->
        <div class="card history-card">
            <h3><?= \Helpers\Icon::get('calendar') ?> Recent Check-ins</h3>
            <?php if (empty($moodHistory)): ?>
                <p style="color: var(--text-secondary);">No check-ins yet. Log your first one today!</p>
            <?php else: ?>
                <ul class="history-list">
                    <?php foreach ($moodHistory as $log): ?>
                        <li class="history-item">
                            <div class="history-meta">
                                <span class="history-date"><?= date('M d, H:i', strtotime($log['created_at'])) ?></span>
                                <div class="history-badges">
                                    <span class="badge mood-<?= $log['mood_level'] ?>">Mood: <?= $log['mood_level'] ?>/5</span>
                                    <span class="badge energy-<?= $log['energy_level'] ?>">Energy: <?= $log['energy_level'] ?>/5</span>
                                </div>
                            </div>
                            <?php if (!empty($log['note'])): ?>
                                <p class="history-note"><?= htmlspecialchars($log['note']) ?></p>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <!-- Quick Tools -->
        <div class="card toolbox">
            <h3><?= \Helpers\Icon::get('tool') ?> Your Toolbox</h3>
            <ul class="tool-list">
                <li><a href="<?= BASE_URL ?>/focus"><?= \Helpers\Icon::get('clock') ?> Focus Room (Pomodoro)</a></li>
                <li><a href="<?= BASE_URL ?>/resources"><?= \Helpers\Icon::get('book') ?> Resource Library</a></li>
                <li><a href="<?= BASE_URL ?>/community"><?= \Helpers\Icon::get('message-circle') ?> Community Feed</a></li>
            </ul>
        </div>
        
        <!-- Resources -->
        <div class="card resources-highlight">
            <h3><?= \Helpers\Icon::get('book') ?> Recommended for You</h3>
            <?php 
                // Simple recommendation logic
                $lastLog = $moodHistory[0] ?? null;
                if ($lastLog) {
                    if ($lastLog['energy_level'] <= 2) {
                        echo '<p>It looks like your energy is low. Try these:</p>';
                        echo '<a href="'.BASE_URL.'/resources/view?id=burnout-recovery" class="resource-link">'. \Helpers\Icon::get('heart') .' Autistic Burnout Recovery</a>';
                    } elseif ($lastLog['mood_level'] <= 2) {
                        echo '<p>Having a tough day? Be gentle with yourself.</p>';
                        echo '<a href="'.BASE_URL.'/resources/view?id=sensory-toolkit" class="resource-link">'. \Helpers\Icon::get('sun') .' Sensory Toolkit</a>';
                    } else {
                        echo '<p>Great to see you doing well! Keep building momentum.</p>';
                        echo '<a href="'.BASE_URL.'/resources/view?id=project-management" class="resource-link">'. \Helpers\Icon::get('briefcase') .' Executive Function Tips</a>';
                    }
                } else {
                    echo '<p>Log your mood to get personalized recommendations!</p>';
                    echo '<a href="'.BASE_URL.'/resources" class="resource-link">Browse All Resources</a>';
                }
            ?>
        </div>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>
