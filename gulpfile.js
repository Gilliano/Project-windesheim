const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// TODO: Use 'mix.combine' instead of 'mix.scripts' to improve compile time?
// https://laravel.com/docs/5.3/elixir#working-with-scripts
elixir(mix => {
    // Important copies that need to be done FIRST
    mix.copy('node_modules/grid-list/src/gridList.js', 'resources/assets/js/grid-list')
        .copy('node_modules/grid-list/src/jquery.gridList.js', 'resources/assets/js/grid-list')
        .copy('node_modules/chart.js/dist/Chart.bundle.js', 'resources/assets/js/charts')
        .copy('node_modules/leaflet/dist/leaflet.js', 'resources/assets/js/leaflet')
        .copy('node_modules/leaflet.markercluster/dist/leaflet.markercluster.js', 'resources/assets/js/leaflet');

    // Styles
    mix.sass('app.scss', 'public/css/app.css')
        .styles('styles.css', 'public/css/styles.css')
        .stylesIn('resources/assets/css/leaflet', 'public/css/leaflet.css') // Leaflet styles
        .stylesIn('resources/assets/css/grid-list', 'public/css/grid-list.css'); // Grid-list syles

    // Scripts
    mix.webpack('app.js','public/js/app.js')
        .scripts([
            // 'jquery/dist/jquery.js', // Already gets loaded by app.js(/bootstrap)
            'jquery-ui-dist/jquery-ui.js'
        ], 'public/js/dependencies.js', 'node_modules/')
        .scripts([
            'utilityFunctions.js'
        ], 'public/js/utility.js')
        .scriptsIn('resources/assets/js/grid-list', 'public/js/grid-list.js') // Grid-list scripts
        .scriptsIn('resources/assets/js/charts', 'public/js/charts.js') // Chart scripts
        .scriptsIn('resources/assets/js/leaflet', 'public/js/leaflet.js'); // Leaflet scripts
});
