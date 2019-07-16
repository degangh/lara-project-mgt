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

mix.js('resources/assets/js/app.js', 'public/sbadmin/js');

mix.sass('resources/assets/sass/app.scss', 'public/sbadmin/css').options({
    processCssUrls: false});
   mix.copy('node_modules/jquery-ui-dist/jquery-ui.min.js', 'public/sbadmin/js');
   mix.copy('node_modules/jquery-ui-dist/jquery-ui.min.css', 'public/sbadmin/css');
   mix.copy('node_modules/jquery-ui-dist/images', 'public/sbadmin/css/images');
   
   mix.js('node_modules/startbootstrap-sb-admin/js/sb-admin.min.js', 'public/sbadmin/js/sbadmin');
   mix.sass('resources/assets/sass/sb-admin.scss', 'public/sbadmin/css/sbadmin');
   mix.copy('node_modules/metismenu/dist/metisMenu.min.css', 'public/sbadmin/css/metismenu');
   mix.copy('node_modules/metismenu/dist/metisMenu.min.css.map', 'public/sbadmin/css/metismenu');
   mix.copy('node_modules/metismenu/dist/metisMenu.min.js', 'public/sbadmin/js/metismenu');
   mix.copy('node_modules/metismenu/dist/metisMenu.min.js.map', 'public/sbadmin/js/metismenu');
   mix.js('node_modules/jquery.easing/jquery.easing.js', 'public/sbadmin/js/jquery.easing')
   mix.copy('node_modules/select2/dist/js/select2.min.js', 'public/sbadmin/js/select2');
   mix.copy('node_modules/select2/dist/css/select2.min.css', 'public/sbadmin/css/select2');