const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/stats.scss', 'public/css')
    .sass('resources/scss/global.scss', 'public/css')
    .sass('resources/scss/data.scss', 'public/css')
    .sass('resources/scss/inventory.scss', 'public/css')
    .sass('resources/scss/map.scss', 'public/css')
    .sass('resources/scss/radio.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
