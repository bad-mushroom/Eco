const mix = require('laravel-mix');

mix.js(`${__dirname}/js/theme.js`, 'dist/js')
mix.sass(`${__dirname}/sass/theme.scss`, 'dist/css')
