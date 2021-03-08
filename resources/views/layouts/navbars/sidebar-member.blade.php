@php
  $default_route = "merchant";
  $titlePage = "merchant";
@endphp
<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">

  <div class="logo">
    <a href="{{route($default_route)}}" class="simple-text logo-normal">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url($default_route) }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Data') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url($default_route.'/profile') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'products' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url($default_route.'/products') }}">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal">{{ __('Products') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'promo' ? ' active' : '' }}">
              <a class="nav-link" href="{{ url($default_route.'/promo') }}">
                <span class="sidebar-mini"> Pr </span>
                <span class="sidebar-normal">{{ __('Promo') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>
