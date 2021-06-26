@yield('navbar')	
<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter" filter-color="black" style="background:url('{{asset('img/landscape_hills.gif')}}'); background-size: cover; background-position: top center;align-items: center;padding: 4vh 0 !important;" data-color="purple">
  <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    @yield('content')
    @include('layouts.footers.guest')
  </div>
</div>
