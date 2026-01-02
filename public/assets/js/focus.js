document.addEventListener('DOMContentLoaded', () => {
    // ==========================================
    // Sound Manager (Web Audio API)
    // ==========================================
    const SoundManager = {
        ctx: null,
        source: null,
        gainNode: null,
        isPlaying: false,
        currentType: null,

        init() {
            if (!this.ctx) {
                this.ctx = new (window.AudioContext || window.webkitAudioContext)();
                this.gainNode = this.ctx.createGain();
                this.gainNode.connect(this.ctx.destination);
                
                // Set initial volume from slider
                const volSlider = document.getElementById('noise-volume');
                if (volSlider) this.gainNode.gain.value = volSlider.value;
            }
            if (this.ctx.state === 'suspended') {
                this.ctx.resume();
            }
        },

        play(type) {
            this.init();
            if (this.isPlaying && this.currentType === type) {
                this.stop();
                return false; // Stopped
            }
            if (this.isPlaying) this.stop();

            const bufferSize = 2 * this.ctx.sampleRate;
            const buffer = this.ctx.createBuffer(1, bufferSize, this.ctx.sampleRate);
            const data = buffer.getChannelData(0);

            if (type === 'white') {
                for (let i = 0; i < bufferSize; i++) {
                    data[i] = Math.random() * 2 - 1;
                }
            } else if (type === 'pink') {
                let b0 = 0, b1 = 0, b2 = 0, b3 = 0, b4 = 0, b5 = 0, b6 = 0;
                for (let i = 0; i < bufferSize; i++) {
                    const white = Math.random() * 2 - 1;
                    b0 = 0.99886 * b0 + white * 0.0555179;
                    b1 = 0.99332 * b1 + white * 0.0750759;
                    b2 = 0.96900 * b2 + white * 0.1538520;
                    b3 = 0.86650 * b3 + white * 0.3104856;
                    b4 = 0.55000 * b4 + white * 0.5329522;
                    b5 = -0.7616 * b5 - white * 0.0168980;
                    data[i] = b0 + b1 + b2 + b3 + b4 + b5 + b6 + white * 0.5362;
                    data[i] *= 0.11; 
                    b6 = white * 0.115926;
                }
            } else if (type === 'brown') {
                let lastOut = 0;
                for (let i = 0; i < bufferSize; i++) {
                    const white = Math.random() * 2 - 1;
                    data[i] = (lastOut + (0.02 * white)) / 1.02;
                    lastOut = data[i];
                    data[i] *= 3.5; 
                }
            }

            this.source = this.ctx.createBufferSource();
            this.source.buffer = buffer;
            this.source.loop = true;
            this.source.connect(this.gainNode);
            this.source.start();
            this.isPlaying = true;
            this.currentType = type;
            return true; // Playing
        },

        stop() {
            if (this.source) {
                this.source.stop();
                this.source = null;
            }
            this.isPlaying = false;
            this.currentType = null;
        },

        setVolume(val) {
            if (this.gainNode) {
                this.gainNode.gain.value = val;
            }
        }
    };

    // UI Wiring for Sound
    const noiseBtns = document.querySelectorAll('.play-noise');
    const volumeSlider = document.getElementById('noise-volume');
    const playIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>';
    const pauseIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect></svg>';

    noiseBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const type = btn.dataset.type;
            const isNowPlaying = SoundManager.play(type);
            
            // Update UI
            noiseBtns.forEach(b => {
                b.classList.remove('playing');
                b.innerHTML = playIcon;
            });

            if (isNowPlaying) {
                btn.classList.add('playing');
                btn.innerHTML = pauseIcon;
            }
        });
    });

    if (volumeSlider) {
        volumeSlider.addEventListener('input', (e) => {
            SoundManager.setVolume(e.target.value);
        });
    }


    // ==========================================
    // Notification Logic
    // ==========================================
    const notifyBtn = document.getElementById('enable-notifications');
    let notificationsEnabled = false;

    if (("Notification" in window) && Notification.permission !== 'granted' && Notification.permission !== 'denied') {
        if(notifyBtn) {
            notifyBtn.style.display = 'inline-block';
            notifyBtn.addEventListener('click', () => {
                Notification.requestPermission().then(permission => {
                    if (permission === "granted") {
                        notificationsEnabled = true;
                        notifyBtn.style.display = 'none';
                        new Notification("Focus Room", { body: "Notifications enabled!" });
                    }
                });
            });
        }
    } else if (Notification.permission === 'granted') {
        notificationsEnabled = true;
    }

    function sendNotification(title, body) {
        // Play sound
        try {
            // Simple beep
            const ctx = SoundManager.ctx || new (window.AudioContext || window.webkitAudioContext)();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.connect(gain);
            gain.connect(ctx.destination);
            osc.frequency.value = 440;
            gain.gain.value = 0.1;
            osc.start();
            setTimeout(() => osc.stop(), 500);
        } catch(e) {}

        if (notificationsEnabled) {
            new Notification(title, { body, icon: '/favicon.ico' });
        } else {
            // Fallback to title flash or similar if needed, but no alert()
            const originalTitle = document.title;
            let flashState = false;
            const flashInterval = setInterval(() => {
                document.title = flashState ? "TIME IS UP!" : title;
                flashState = !flashState;
            }, 1000);
            
            // Stop flashing on interaction
            window.addEventListener('mousemove', () => {
                clearInterval(flashInterval);
                document.title = originalTitle;
            }, { once: true });
        }
    }


    // ==========================================
    // Timer Logic
    // ==========================================
    let timeLeft = 25 * 60;
    let timerId = null;
    let isRunning = false;
    
    const display = document.getElementById('timer-display');
    const startBtn = document.getElementById('start-timer');
    const pauseBtn = document.getElementById('pause-timer');
    const resetBtn = document.getElementById('reset-timer');
    const modeBtns = document.querySelectorAll('.mode-btn');

    // Load saved task if any
    const taskInput = document.getElementById('focus-task-input');
    if (taskInput && localStorage.getItem('neurofem_focus_task')) {
        taskInput.value = localStorage.getItem('neurofem_focus_task');
    }

    if (taskInput) {
        taskInput.addEventListener('input', (e) => {
            localStorage.setItem('neurofem_focus_task', e.target.value);
        });
    }

    function updateDisplay() {
        if (!display) return;
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        display.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        document.title = `${display.textContent} - Focus Room`;
    }

    function startTimer() {
        if (isRunning) return;
        
        // Resume Audio Context if needed
        if (SoundManager.ctx && SoundManager.ctx.state === 'suspended') {
            SoundManager.ctx.resume();
        }

        isRunning = true;
        if(startBtn) startBtn.disabled = true;
        if(pauseBtn) pauseBtn.disabled = false;
        
        timerId = setInterval(() => {
            if (timeLeft > 0) {
                timeLeft--;
                updateDisplay();
            } else {
                clearInterval(timerId);
                isRunning = false;
                if(startBtn) startBtn.disabled = false;
                if(pauseBtn) pauseBtn.disabled = true;
                
                sendNotification("Time's Up!", "Great job! Take a well-deserved break.");
            }
        }, 1000);
    }

    function pauseTimer() {
        clearInterval(timerId);
        isRunning = false;
        if(startBtn) startBtn.disabled = false;
        if(pauseBtn) pauseBtn.disabled = true;
    }

    function resetTimer() {
        pauseTimer();
        // Get time from active mode
        const activeMode = document.querySelector('.mode-btn.active');
        if (activeMode) {
            timeLeft = parseInt(activeMode.dataset.time) * 60;
        } else {
            timeLeft = 25 * 60;
        }
        updateDisplay();
    }

    if(startBtn) startBtn.addEventListener('click', startTimer);
    if(pauseBtn) pauseBtn.addEventListener('click', pauseTimer);
    if(resetBtn) resetBtn.addEventListener('click', resetTimer);

    modeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modeBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            timeLeft = parseInt(btn.dataset.time) * 60;
            updateDisplay();
            pauseTimer();
        });
    });


    // ==========================================
    // Micro Steps Logic
    // ==========================================
    const stepInput = document.getElementById('micro-step-input');
    const addStepBtn = document.getElementById('add-step-btn');
    const stepList = document.getElementById('micro-steps-list');

    function addStep() {
        const text = stepInput.value.trim();
        if (!text) return;

        createStepElement(text);
        saveSteps();
        stepInput.value = '';
    }

    function createStepElement(text, completed = false) {
        if (!stepList) return;

        const li = document.createElement('li');
        if (completed) li.classList.add('completed');
        
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.checked = completed;
        checkbox.addEventListener('change', () => {
            li.classList.toggle('completed');
            saveSteps();
        });

        const span = document.createElement('span');
        span.textContent = text;
        
        // Delete button
        const deleteBtn = document.createElement('button');
        deleteBtn.innerHTML = '&times;';
        deleteBtn.setAttribute('aria-label', 'Delete step');
        deleteBtn.style.marginLeft = 'auto';
        deleteBtn.style.background = 'none';
        deleteBtn.style.border = 'none';
        deleteBtn.style.color = 'var(--text-tertiary)';
        deleteBtn.style.cursor = 'pointer';
        deleteBtn.style.fontSize = '1.2rem';
        deleteBtn.style.padding = '0 5px';
        
        deleteBtn.addEventListener('click', () => {
            li.remove();
            saveSteps();
        });

        li.appendChild(checkbox);
        li.appendChild(span);
        li.appendChild(deleteBtn);
        stepList.appendChild(li);
    }

    function saveSteps() {
        if (!stepList) return;
        const steps = [];
        stepList.querySelectorAll('li').forEach(li => {
            steps.push({
                text: li.querySelector('span').textContent,
                completed: li.querySelector('input').checked
            });
        });
        localStorage.setItem('neurofem_micro_steps', JSON.stringify(steps));
    }

    function loadSteps() {
        const saved = localStorage.getItem('neurofem_micro_steps');
        if (saved) {
            const steps = JSON.parse(saved);
            steps.forEach(step => createStepElement(step.text, step.completed));
        }
    }

    if(addStepBtn) addStepBtn.addEventListener('click', addStep);
    if(stepInput) stepInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') addStep();
    });

    // Initialize
    if (stepList) loadSteps();
});