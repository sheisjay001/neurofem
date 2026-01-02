<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="container" style="padding-top: var(--spacing-lg);">
    <div class="focus-room-container">
        <div class="focus-header">
            <h1><?= \Helpers\Icon::get('target') ?> Focus Room</h1>
            <p>A distraction-free space to help you manage executive function.</p>
        </div>

        <div class="focus-grid">
            <!-- Timer Section -->
            <div class="card timer-card">
                <h2><?= \Helpers\Icon::get('clock') ?> Focus Timer</h2>
                <div class="timer-display" id="timer-display">25:00</div>
                
                <div class="timer-controls">
                    <button id="start-timer" class="btn btn-primary btn-lg">Start Focus</button>
                    <button id="pause-timer" class="btn btn-outline btn-lg" disabled>Pause</button>
                    <button id="reset-timer" class="btn btn-secondary btn-lg">Reset</button>
                </div>

                <div class="timer-modes">
                    <button class="mode-btn active" data-time="25">Pomodoro (25m)</button>
                    <button class="mode-btn" data-time="5">Short Break (5m)</button>
                    <button class="mode-btn" data-time="15">Long Break (15m)</button>
                </div>
                
                <button id="enable-notifications" class="btn btn-sm btn-ghost" style="margin-top: 1rem; display: none;">
                    <?= \Helpers\Icon::get('alert-triangle') ?> Enable Desktop Notifications
                </button>
            </div>

            <!-- Soundscape Section -->
            <div class="card sound-card">
                <h2><?= \Helpers\Icon::get('volume-2') ?> Audio Focus</h2>
                <p class="hint-text">Generated noise to mask distractions.</p>
                
                <div class="sound-controls">
                    <div class="sound-option">
                        <button class="btn-icon play-noise" data-type="brown" aria-label="Play Brown Noise">
                            <?= \Helpers\Icon::get('play') ?>
                        </button>
                        <span>Brown Noise</span>
                    </div>
                    <div class="sound-option">
                        <button class="btn-icon play-noise" data-type="white" aria-label="Play White Noise">
                            <?= \Helpers\Icon::get('play') ?>
                        </button>
                        <span>White Noise</span>
                    </div>
                    <div class="sound-option">
                        <button class="btn-icon play-noise" data-type="pink" aria-label="Play Pink Noise">
                            <?= \Helpers\Icon::get('play') ?>
                        </button>
                        <span>Pink Noise</span>
                    </div>
                </div>
                <div class="volume-control" style="margin-top: 1rem; display: flex; align-items: center; gap: 10px;">
                    <?= \Helpers\Icon::get('volume-2', 'icon-sm') ?>
                    <input type="range" id="noise-volume" min="0" max="1" step="0.05" value="0.1" style="flex: 1;">
                </div>
            </div>

            <!-- Task Breakdown Section -->
            <div class="card task-card">
                <h2><?= \Helpers\Icon::get('edit') ?> One Thing At A Time</h2>
                <p class="hint-text">Breaking tasks down reduces overwhelm.</p>
                
                <div class="current-task-input">
                    <input type="text" id="focus-task-input" placeholder="What is the ONE thing you are doing right now?" aria-label="Current Focus Task">
                </div>

                <div class="micro-steps">
                    <h3>Micro-Steps (Optional)</h3>
                    <ul id="micro-steps-list">
                        <!-- Steps will be added here via JS -->
                    </ul>
                    <div class="add-step-wrapper">
                        <input type="text" id="micro-step-input" placeholder="Add a tiny first step..." aria-label="Add micro step">
                        <button id="add-step-btn" class="btn btn-sm btn-secondary">+</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Focus Room Specific Scripts -->
<script src="<?= BASE_URL ?>/assets/js/focus.js" defer></script>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>