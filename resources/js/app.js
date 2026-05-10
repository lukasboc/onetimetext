import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

document.addEventListener('DOMContentLoaded', () => {
    const toggles = [
        document.getElementById('theme-toggle'),
        document.getElementById('theme-toggle-mobile'),
    ].filter(Boolean);

    const html = document.documentElement;

    function syncToggles() {
        const isDark = html.getAttribute('data-theme') === 'onetimetext';
        toggles.forEach(t => { t.checked = isDark; });
    }

    syncToggles();

    toggles.forEach(toggle => {
        toggle.addEventListener('change', () => {
            const next = toggle.checked ? 'onetimetext' : 'onetimetext-light';
            html.setAttribute('data-theme', next);
            localStorage.setItem('theme', next);
            syncToggles();
        });
    });

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        if (localStorage.getItem('theme') !== null) return;
        const next = e.matches ? 'onetimetext' : 'onetimetext-light';
        html.setAttribute('data-theme', next);
        syncToggles();
    });
});
