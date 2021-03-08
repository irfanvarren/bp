<div class="wrapper">
  @php
  $url_segment = Request::segment(1);
  $dashboard = $dashboard ?? 'admin';
  @endphp

  @if($url_segment == "merchant")
  @include('layouts.navbars.sidebar-member')
  @else

  @auth("web")
  @if ($dashboard == "sekolah")
  @include('layouts.navbars.sidebar-sekolah')
  @elseif($dashboard == "tutor")
  @include('layouts.navbars.sidebar-tutor')
  @else
  @include('layouts.navbars.sidebar-admin')
  @endif
  @endauth
  @endif


  <div class="main-panel">
   @if($url_segment == "merchant")
   @auth("merchant")
   @include('layouts.navbars.navs.auth')
   @endauth

   @else
   @auth("web")
   @include('layouts.navbars.navs.admin-auth')
   @endauth
   @endif    
   @yield('content')
   @include('layouts.footers.auth')
 </div>
</div>
