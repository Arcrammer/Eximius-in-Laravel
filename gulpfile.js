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
      'User.scss'
    ], 'resources/assets/css/User.css')
    .styles([
      'Reset.css',
      'User.css'
    ], 'public/assets/css/User.css');

    // Listings
    mix.sass([
      'Main.scss',
      'Listings.scss'
    ], 'resources/assets/css/Listings.css')
    .styles([
      'Reset.css',
      'Listings.css'
    ], 'public/assets/css/Listings.css');

    /* Scripts */
    // User
    mix.coffee('User.coffee', 'public/assets/js/User.js');

    mix.version([
      // Stylesheets
      'assets/css/Welcome.css',
      'assets/css/Authentication.css',
      'assets/css/User.css',
      'assets/css/Listings.css',

      // Scripts
      'assets/js/User.js'
    ]);
});
