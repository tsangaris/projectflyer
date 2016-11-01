<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/libs.css">
  </head>
  <body>
      @include('includes.navbar')

      <div class="container">
        @yield('content')
      </div>

      <script type="text/javascript" src="/js/libs.js"></script>
      @include('flash')
  </body>
</html>
