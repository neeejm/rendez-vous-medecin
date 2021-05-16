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

mix
    .js('resources/js/app.js', 'public/js')
    .js('vendor/snapappointments/bootstrap-select/js/bootstrap-select.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('vendor/snapappointments/bootstrap-select/sass/bootstrap-select.scss', 'public/css');
