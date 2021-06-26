<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an imag e using data-image tag
  -->
    <div class="logo">
        <a href="{{route('admin-dashboard')}}" class="simple-text text-center logo-normal">
            {{ __("Tutor") }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('tutor-admin') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <!--<li class="nav-item {{ ($activePage == 'places-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#places" aria-expanded="true">
                    <i class="material-icons">widgets</i>
                    <p>{{ __('Places') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ ($activeMenu == 'places-management') ? 'show' : ''}}" id="places">
                    <ul class="nav">

                        <li class="nav-item{{ $activePage == 'countries' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ url('cari-sekolah/admin/countries') }}">
                                <i class="material-icons">my_location</i>
                                <p>{{ __('Countries') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'regions' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ url('cari-sekolah/admin/regions') }}">
                                <i class="material-icons">terrain</i>
                                <p>{{ __('Regions') }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'cities' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ url('cari-sekolah/admin/cities') }}">
                                <i class="material-icons">apartment</i>
                                <p>{{ __('Cities') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>-->
          
            <li class="nav-item{{ $activePage == 'tests' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('tutor-admin/tests') }}">
                    <i class="material-icons">T</i>
                    <p>{{ __('Test') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'packages' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('tutor-admin/packages') }}">
                    <i class="material-icons">P</i>
                    <p>{{ __('Package') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'modules' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('tutor-admin/modules') }}">
                    <i class="material-icons">M</i>
                    <p>{{ __('Module') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'section-types' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('tutor-admin/section-types') }}">
                    <i class="material-icons">ST</i>
                    <p>{{ __('Section Types') }}</p>
                </a>
            </li>
             <li class="nav-item{{ $activePage == 'test-results' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('tutor-admin/test-results') }}">
                    <i class="material-icons">TR</i>
                    <p>{{ __('Test Results') }}</p>
                </a>
            </li>
           <!-- <li class="nav-item{{ $activePage == 'questions' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('tutor-admin/questions') }}">
                    <i class="material-icons">Q</i>
                    <p>{{ __('Question') }}</p>
                </a>
            </li>
                        <li class="nav-item{{ $activePage == 'options' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('tutor-admin/options') }}">
                    <i class="material-icons">O</i>
                    <p>{{ __('Options') }}</p>
                </a>
            </li>-->
           
        </ul>
    </div>
</div>
