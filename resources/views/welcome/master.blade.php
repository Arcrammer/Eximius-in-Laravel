<!DOCTYPE html>
<html>
  <head>
      <title>Eximius | @yield('title', '?')</title>

      <!-- Metadata -->
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta id="viewport" name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="application-name" content="Eximius">
      <meta name="description" content="Hand reviewed and verified employment listings.">
      <meta name="author" content="Alexander Rhett Crammer">
      <meta name="generator" content="Atom, Ruby on Rails, GitHub, Puma, Mac OS X">
      <meta name="keywords" content="Jobs, Careers, Professional">

      <!-- Stylesheets -->
      <link href="{{ elixir('assets/css/Welcome.css') }}" rel="stylesheet">
      @yield('extra_stylesheets')
  </head>
  <body>
    <nav>
      <!-- <div class="logo">
        <a href="/">Eximius</a>
      </div> <!-- .logo -->
      <ul>
        <li><a href="/">Welcome</a></li>
        <li><a href="/what-we-do/">Our Work</a></li>
      </ul>
      <div class="logo">
        <a href="/">Eximius</a>
      </div> <!-- .logo -->
      <ul>
        <li><a href="/listings">Listings</a></li>
        <li><a href="/register">Sign Up</a></li>
      </ul>
      </ul>
    </nav>
    <div class="container">
      @yield('content')
    </div> <!-- .container -->

    <!-- Scripts -->
    @yield('extra_scripts')
  </body>
</html>