import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/js/app.js',
                'resources/js/slider.js',
                'resources/js/pagination.js',
                'resources/js/search.js'
            ],
            refresh: true,
        }),
    ],
});
