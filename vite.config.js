const { defineConfig } = require('vite');
const laravel = require('laravel-vite-plugin');

module.exports = defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '127.0.0.1',
        watch: {
            usePolling: true
        }
    },
});
