import laravel, { refreshPaths } from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    server: {
        port: 4000,
        proxy: {
            '/': {
                target: 'http://localhost:8000',
                changeOrigin: true,
            },
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            // refresh: true,
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
});
