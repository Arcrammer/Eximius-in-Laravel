<!DOCTYPE html>
<html>
  <head>
      <title>Eximius | @yield('title', '?')</title>

      <!-- Stylesheets -->
      @yield('extra_stylesheets')
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div> <!-- .container -->

    <!-- Scripts -->
    @yield('extra_scripts')
  </body>
</html>
