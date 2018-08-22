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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
   mix.copy('node_modules/jquery-ui-dist/jquery-ui.min.js', 'public/js');
   mix.copy('node_modules/jquery-ui-dist/jquery-ui.min.css', 'public/css');
   mix.copy('node_modules/jquery-ui-dist/images', 'public/css/images');
   
   mix.js('node_modules/startbootstrap-sb-admin/js/sb-admin.min.js', 'public/js/sbadmin')
   .sass('node_modules/startbootstrap-sb-admin/scss/sb-admin.scss', 'public/css/sbadmin');
   mix.copy('node_modules/metismenu/dist/metisMenu.min.css', 'public/css/metismenu');
   mix.copy('node_modules/metismenu/dist/metisMenu.min.css.map', 'public/css/metismenu');
   mix.copy('node_modules/metismenu/dist/metisMenu.min.js', 'public/js/metismenu');
   mix.copy('node_modules/metismenu/dist/metisMenu.min.js.map', 'public/js/metismenu');
   mix.js('node_modules/jquery.easing/jquery.easing.js', 'public/js/jquery.easing')
   mix.copy('node_modules/select2/dist/js/select2.min.js', 'public/js/select2');
   mix.copy('node_modules/select2/dist/css/select2.min.css', 'public/css/select2');