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
    /* Stylesheets */
    // Welcome
    mix.sass([
      'Main.scss',
      'Hover.scss',
      'Welcome.scss'
    ], 'resources/assets/css/Welcome.css')
    .styles([
      'Reset.css',
      'Welcome.css'
    ], 'public/assets/css/Welcome.css');

    // Blog
    mix.sass([
      'Main.scss',
      'Hover.scss',
      'ListView.scss',
      'Blog.scss'
    ], 'resources/assets/css/Blog.css')
    .styles([
      'Reset.css',
      'Blog.css'
    ], 'public/assets/css/Blog.css');

    // Authentication
    mix.sass([
      'Authentication.scss'
    ], 'resources/assets/css/Authentication.css')
    .styles([
      'Reset.css',
      'Authentication.css'
    ], 'public/assets/css/Authentication.css');

    // User
    mix.sass([
      'Main.scss',
      'Hover.scss',
      'User.scss'
    ], 'resources/assets/css/User.css')
    .styles([
      'Reset.css',
      'User.css'
    ], 'public/assets/css/User.css');

    // Messages
    mix.sass([
      'Main.scss',
      'Hover.scss',
      'Messages.scss'
    ], 'resources/assets/css/Messages.css')
    .styles([
      'Reset.css',
      'Messages.css'
    ], 'public/assets/css/Messages.css');

    // List Views
    mix.sass([
      'Hover.scss',
      'ListView.scss'
    ], 'resources/assets/css/ListView.css')
    .styles([
      'Reset.css',
      'ListView.css'
    ], 'public/assets/css/ListView.css');

    /* Scripts */
    // User
    mix.coffee('User.coffee', 'public/assets/js/User.js');

    mix.version([
      // Stylesheets
      'assets/css/Welcome.css',
      'assets/css/Blog.css',
      'assets/css/Authentication.css',
      'assets/css/User.css',
      'assets/css/ListView.css',
      'public/assets/css/Messages.css',

      // Scripts
      'assets/js/User.js'
    ]);
});
