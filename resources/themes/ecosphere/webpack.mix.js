const mix = require('laravel-mix');

mix.sass(`${__dirname}/sass/theme.scss`, 'dist/css')
mix.js(`${__dirname}/js/app.js`, 'dist/js')
