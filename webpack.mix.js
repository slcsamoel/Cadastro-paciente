let mix = require('laravel-mix');

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

mix.scripts([
   'resources/assets/js/vue.js',
   'resources/assets/js/axios.js',
   'resources/assets/js/app.js',
   'resources/assets/js/jquery.js',
   'resources/assets/js/jquery.min.js',
    ],'public/js/app.js');
   
