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
    .js('resources/js/pollView.js', 'public/js')
    .js('resources/js/pollNew.js', 'public/js')
    .postCss('resources/scss/pagination.css', 'public/css', [
        require('tailwindcss'),
    ])
    .sass('resources/scss/app.css', 'public/css')
    .sass('resources/scss/home.scss', 'public/css')
    .sass('resources/scss/pollNew.scss', 'public/css')
    .sass('resources/scss/pollView.scss', 'public/css')
    .sass('resources/scss/user.scss', 'public/css')
    .sass('resources/scss/userLogin.scss', 'public/css')
    .version();
