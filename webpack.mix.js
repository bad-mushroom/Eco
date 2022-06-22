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

/**
 * Sets the default public path to "public/eco".
 */
mix.setPublicPath('public/eco');

/**
 * These resources are responsible for the Eco management app.
 */
mix.js('resources/js/app.js', 'manage/js')
  .sass('resources/scss/app.scss', '/manage/css');

