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

elixir(mix => {
    mix.sass('app.scss')
        .sass('grid-list_style.scss', 'public/css/grid-list.css');

    mix.webpack('app.js','public/js/app.js')
        .scripts([
            // 'jquery/dist/jquery.js', // Already gets loaded by app.js(/bootstrap)
            'jquery-ui-dist/jquery-ui.js',
            'grid-list/src/gridList.js',
            'grid-list/src/jquery.gridList.js'
        ], 'public/js/dependencies.js', 'node_modules/')
        .scripts([
            'utilityFunctions.js'
        ], 'public/js/utility.js')
        .scripts([
            'grid-list_fixtures.js',
            'grid-list_init.js'
        ], 'public/js/grid-list.js');
});
