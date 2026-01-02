document.addEventListener('DOMContentLoaded', () => {
    // Elements
    const accToggle = document.getElementById('acc-toggle');
    const accDropdown = document.getElementById('acc-dropdown');
    const themeBtns = document.querySelectorAll('[data-set-theme]');
    const fontBtns = document.querySelectorAll('[data-set-font]');
    const sizeSlider = document.getElementById('font-size-slider');

    // State
    const prefs = {
        theme: localStorage.getItem('theme') || 'light',
        font: localStorage.getItem('font') || 'sans',
        size: localStorage.getItem('size') || '18'
    };

    // Initialize
    applyPrefs();

    // Mobile Menu Toggle
    const mobileToggle = document.getElementById('mobile-menu-toggle');
    const navLinks = document.getElementById('nav-links');

    if (mobileToggle && navLinks) {
        mobileToggle.addEventListener('click', () => {
            navLinks.classList.toggle('open');
            // Update aria-label or similar if needed for a11y
            const isOpen = navLinks.classList.contains('open');
            mobileToggle.setAttribute('aria-expanded', isOpen);
        });
    }

    // Toggle Dropdown
    accToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        const isHidden = accDropdown.hidden;
        accDropdown.hidden = !isHidden;
        accToggle.setAttribute('aria-expanded', !isHidden);
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!accToggle.contains(e.target) && !accDropdown.contains(e.target)) {
            accDropdown.hidden = true;
            accToggle.setAttribute('aria-expanded', 'false');
        }
    });

    // Theme Handlers
    themeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            prefs.theme = btn.dataset.setTheme;
            saveAndApply();
        });
    });

    // Font Handlers
    fontBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            prefs.font = btn.dataset.setFont;
            saveAndApply();
        });
    });

    // Size Handler
    sizeSlider.addEventListener('input', (e) => {
        prefs.size = e.target.value;
        document.documentElement.style.setProperty('--base-size', prefs.size + 'px');
        localStorage.setItem('size', prefs.size);
    });

    function saveAndApply() {
        localStorage.setItem('theme', prefs.theme);
        localStorage.setItem('font', prefs.font);
        applyPrefs();
    }

    function applyPrefs() {
        // Theme
        document.body.setAttribute('data-theme', prefs.theme);
        themeBtns.forEach(btn => {
            btn.classList.toggle('active', btn.dataset.setTheme === prefs.theme);
        });

        // Font
        document.body.setAttribute('data-font', prefs.font);
        fontBtns.forEach(btn => {
            btn.classList.toggle('active', btn.dataset.setFont === prefs.font);
        });

        // Size
        document.documentElement.style.setProperty('--base-size', prefs.size + 'px');
        sizeSlider.value = prefs.size;
    }
    
    // Password Strength Logic
    const passwordInput = document.getElementById('password');
    const strengthMeter = document.querySelector('.password-strength-meter');
    const strengthBar = document.getElementById('strength-bar');
    const strengthText = document.getElementById('strength-text');

    if (passwordInput && strengthMeter) {
        passwordInput.addEventListener('input', () => {
            const val = passwordInput.value;
            strengthMeter.style.display = val.length > 0 ? 'block' : 'none';
            
            const result = calculateStrength(val);
            
            strengthBar.style.width = `${result.score}%`;
            strengthBar.style.backgroundColor = result.color;
            strengthText.textContent = result.message;
        });
    }

    function calculateStrength(password) {
        let score = 0;
        let message = 'Too Weak';
        let color = 'var(--error)';

        if (password.length > 8) score += 25;
        if (password.match(/[A-Z]/)) score += 25;
        if (password.match(/[0-9]/)) score += 25;
        if (password.match(/[^A-Za-z0-9]/)) score += 25;

        if (score < 50) {
            message = 'Weak - Keep typing...';
            color = 'var(--error)';
        } else if (score < 75) {
            message = 'Good';
            color = 'var(--brand-accent)';
        } else {
            message = 'Strong!';
            color = 'var(--success)';
        }

        return { score, message, color };
    }
});
