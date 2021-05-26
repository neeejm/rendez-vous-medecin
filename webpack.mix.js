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
    .js('resources/js/bootstrap-datetimepicker.min.js', 'public/js')
    .js('resources/js/datepicker.js', 'public/js')
    .js('resources/js/theme.js', 'public/js')
    .js('resources/js/slide.js', 'public/js')
    .js('resources/js/calendar.js', 'public/js')

    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/bootstrap-datetimepicker.min.css', 'public/css')
    // .postCss('node_modules/@fortawesome/fontawesome-free/css/fontawesome.min.css', 'public/css')
    // .postCss('node_modules/ortawesome/fontawesome-free/css/fontawesome.min.css', 'public/css')
    .postCss('resources/css/style.css', 'public/css')
    .postCss('resources/css/slide.css', 'public/css')
    .postCss('resources/css/calendar.css', 'public/css')

    .sass('resources/sass/app.scss', 'public/css')
    .sass('vendor/snapappointments/bootstrap-select/sass/bootstrap-select.scss', 'public/css')

    .vue();
