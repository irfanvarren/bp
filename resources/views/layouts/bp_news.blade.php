<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('includes.head')
</head>
<body>
  <div class="container-fluid">
    <header class="row clearfix m-0">
      <div class="col-md-2 logo-wrapper">
       <a href="/"><img src="{{asset('/img/logo lama.png')}}" class="logo"></a>
     </div>
     <div class="col-md-10">
      <div class="row">
        <div class="col-md-12 menu">
         @menu('navigation-bar')
       </div>
     </div>
   </div>
   @include('includes.mobile-nav')

 </header>

 <div id="main" class="row" style="padding:30px 45px;background-color:#ebecf0 !important;margin-top:65px;">
  <div class="popup-overlay"></div>
  @yield('content')
</div>

<footer class="row">
  <div class="col-md-12">
    @include('includes.new-top-footer')
    @include('includes.footer')
  </div>
</footer>
</div>

@stack('more-script')
<!-- </body></html> -->
</body>
</html>
