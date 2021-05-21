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

    // .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/bootstrap-datetimepicker.min.css', 'public/css')
    .postCss('resources/css/fontawesome/css/all.min.css', 'public/css')
    .postCss('resources/css/fontawesome/css/fontawesome.min.css', 'public/css')
    .postCss('resources/css/style.css', 'public/css')
    .postCss('resources/css/slide.css', 'public/css')

    .sass('resources/sass/app.scss', 'public/css')
    .sass('vendor/snapappointments/bootstrap-select/sass/bootstrap-select.scss', 'public/css')

    // by test template 
    // .js('resources/js/main.js', 'public/js')

    // .postCss('resources/css/style.css', 'public/css')

    // .postCss('vendor/icofont/icofont.min.css', 'public/vendor/css')
    // .postCss('vendor/boxicons/css/boxicons.min.css', 'public/vendor/css')
    // .postCss('vendor/animate.css/animate.min.css', 'public/vendor/css')
    // .postCss('vendor/owl.carousel/assets/owl.carousel.min.css', 'public/vendor/css')
    // .postCss('vendor/venobox/venobox.css', 'public/vendor/css')
    // .postCss('vendor/aos/aos.css', 'public/vendor/css')

    // .js('vendor/jquery.easing/jquery.easing.min.js', 'public/vendor/js')
    // .js('vendor/php-email-form/validate.js', 'public/vendor/js')
    // .js('vendor/waypoints/jquery.waypoints.min.js', 'public/vendor/js')
    // .js('vendor/counterup/counterup.min.js', 'public/vendor/js')
    // .js('vendor/owl.carousel/owl.carousel.min.js', 'public/vendor/js')
    // .js('vendor/venobox/venobox.min.js', 'public/vendor/js')
    // .js('vendor/aos/aos.js', 'public/vendor/js')
    // end by test template

    .vue();
