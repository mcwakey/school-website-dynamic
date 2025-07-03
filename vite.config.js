import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        // Ensure assets are properly chunked for production
        rollupOptions: {
            output: {
                manualChunks: undefined,
            }
        },
        // Ensure CSS is extracted properly
        cssCodeSplit: true,
        // Set a higher chunk size warning limit
        chunkSizeWarningLimit: 1000,
    },
    // Ensure proper MIME types in dev mode
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});
