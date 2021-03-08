<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @include('includes.head')
  <!-- Fonts -->

  <!-- Styles -->
  @stack('head-script')
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

  <div id="main" class="row">
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

<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('js/mega-menu/megamenu.js')}}"></script> 
@stack('more-script')
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5e7da78635bcbb0c9aaae552/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
  })();
</script>
</body></html>
