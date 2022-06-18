const mix = require('laravel-mix');

mix.js(`${__dirname}/js/app.js`, 'themes/ecosphere/js')
mix.sass(`${__dirname}/sass/app.scss`, 'themes/ecosphere/css')
