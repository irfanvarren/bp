<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.news-head')
    </head>
    <body>
        <div class="container">
            <header class="row">
        @include('includes.header')
    </header>

    <div id="main" class="row justify-content-center">
      <div class="news-article-wrapper">
        <div class="row">
          @yield('content')
        </div>
      </div>

    </div>

    <footer class="row">
      <div class="col-md-12">

          @include('includes.footer')
      </div>
    </footer>
  </div>

        <!-- </body></html> -->
    </body>
</html>
