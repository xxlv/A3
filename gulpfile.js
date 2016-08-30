const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */


elixir(function(mix) {
    var bootstrapPath = 'node_modules/bootstrap-sass/assets';
    var bootstrapMarkdownPath='node_modules/bootstrap-markdown';

    var jq='node_modules/jQuery';
    mix.sass('app.scss')
        .sass('profile.scss')
        .webpack('app.js')
        .copy(bootstrapPath + '/fonts', 'public/fonts')
        .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js')
        .copy(bootstrapMarkdownPath+'/js/bootstrap-markdown.js','public/js')
        .copy(bootstrapMarkdownPath+'/css/bootstrap-markdown.min.css','public/css')
        .copy(jq+'/dist/jquery.min.js','public/js')
        ;



});
