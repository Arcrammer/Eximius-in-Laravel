{{--
  master.blade.php

  Eximius
  Alexander Rhett Crammer
  Advanced Server-Side Languages
  Created Friday, 27 Nov. 2015
--}}
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
      <meta name="generator" content="Atom, Laravel, Laravel Homestead, GitHub, Mac OS X">
      <meta name="keywords" content="Jobs, Careers, Professional">

      <!-- Stylesheets -->
      @yield('extra_stylesheets')
  </head>
  <body>
    @include ('shared.navigation', ['middle' => 'logo'])
    <div class="container">
      @yield('content')
    </div> <!-- .container -->
    @include ('shared.navigation')
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    @yield('extra_scripts')
  </body>
</html>
