import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/pengeluaranChart.js',
                'resources/js/pemasukanChart.js',
                'resources/js/dashboardLineChart.js',
                'resources/js/dashboardBarChart.js',
                'resources/js/twoLineChart.js', 'resources/js/piecharts.js'

            ],
            refresh: true,
        }),
    ],
});
