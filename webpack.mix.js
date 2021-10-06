const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/assets/js')
    .js('resources/src/js/theme.js', 'public/assets/js')
    .js('resources/src/js/scripts.js', 'public/assets/js')
    .sass('resources/sass/app.scss', 'public/assets/css')
    .styles('resources/dist/css/theme.css', 'public/assets/css/theme.css')
    .copyDirectory('resources/src/js/vendor/modernizr-2.8.3.min.js', 'public/assets/js/vendor/modernizr.js')
    .copyDirectory('resources/plugins', 'public/assets/plugins')
    .copyDirectory('resources/dist/img', 'public/assets/img')
    .version();