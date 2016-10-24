<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
      @include('includes.navbar')
      
      <div class="container">
        @yield('content')
      </div>
  </body>
</html>
