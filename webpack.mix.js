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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/purcahseAddRow.js', 'public/js')
    .js('resources/js/salesAddRow.js', 'public/js')
    .js('resources/js/saledropdown.js', 'public/js')
    .js('resources/js/purchaseDropdown.js', 'public/js')
    .js('resources/js/subtotal.js', 'public/js')
    .js('resources/js/total.js', 'public/js')
    .js('resources/js/print.js', 'public/js')
    .js('resources/js/damage.js', 'public/js')
    .js('resources/js/main.js', 'public/js')
    .js('resources/js/product.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/view.scss', 'public/css')
    .sass('resources/sass/main.scss', 'public/css', {
        implementation: require('node-sass')
   })
    .sass('resources/sass/front.scss', 'public/css')
    .sourceMaps();
