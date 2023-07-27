
const mix = require('laravel-mix');

mix.js('src/index.js', 'dist').vue();
mix.webpackConfig({
    stats:{
        children:true,
    },});


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .version();



