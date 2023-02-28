import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    // server: {
    //     hmr: {
    //         host: 'localhost',
    //     },
    //     watch: {
    //         ignored: ['!**/node_modules/tailwindcss/**'],
    //       },
    // },

    // optimizeDeps: {
    //     exclude: ['tailwindcss']
    // },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
