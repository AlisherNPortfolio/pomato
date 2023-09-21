import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    server: {
        port: 3000
    },
    plugins: [
        vue({
            version: 3
        }),
        laravel({
            input: ['resources/css/app.css', 'resources/js/main.ts'],
            refresh: true,
        }),
    ],
});
