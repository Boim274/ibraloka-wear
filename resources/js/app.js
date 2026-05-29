import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
Alpine.plugin(collapse);

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    Alpine.data('theme', () => ({
        dark: true,
        init() {
            const stored = localStorage.getItem('admin-theme');
            if (stored === 'light') {
                this.dark = false;
                document.querySelector('.admin-panel')?.setAttribute('data-theme', 'light');
            }
        },
        toggle() {
            this.dark = !this.dark;
            const panel = document.querySelector('.admin-panel');
            if (this.dark) {
                panel?.removeAttribute('data-theme');
                localStorage.setItem('admin-theme', 'dark');
            } else {
                panel?.setAttribute('data-theme', 'light');
                localStorage.setItem('admin-theme', 'light');
            }
        }
    }));

    Alpine.data('sidebar', () => ({
        open: false,
        toggle() {
            this.open = !this.open;
        }
    }));
});

Alpine.start();
