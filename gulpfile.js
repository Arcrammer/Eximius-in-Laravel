var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

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
    mix.sass([
      'Main.scss',
      'Hover.scss',
      'Welcome.scss'
    ], 'resources/assets/css/Welcome.css')
      .styles([
        'Reset.css',
        'Welcome.css'
      ], 'public/assets/css/Welcome.css');

    mix.version('assets/css/Welcome.css');
});
