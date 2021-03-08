<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an imag e using data-image tag
  -->
    <div class="logo">
        <a href="{{route('admin-dashboard')}}" class="simple-text logo-normal text-center">
            {{ __("Admin") }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('cari-sekolah/admin') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item {{ ($activePage == 'places-management') ? ' active' : '' }}">
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
            </li>
             
            <li class="nav-item {{ ($activePage == 'school-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#school-data" aria-expanded="true">
                    <i class="material-icons">widgets</i>
                    <p>{{ __('Schools Data') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse {{ ($activeMenu == 'school-management') ? 'show' : ''}}" id="school-data">
                    <ul class="nav">

                        <li class="nav-item{{ $activePage == 'school' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ url('cari-sekolah/admin/schools') }}">
                                <i class="material-icons">apartment</i>
                                <p>{{ __("Schools") }}</p>
                            </a>
                        </li>
                         <li class="nav-item{{ $activePage == 'school-courses' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ url('cari-sekolah/admin/school-courses') }}">
                                <i class="material-icons">attach_money</i>
                                <p>{{ __("School's Courses") }}</p>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'school-programs' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ url('cari-sekolah/admin/school-programs') }}">
                                <i class="material-icons">attach_money</i>
                                <p>{{ __("School's Programs") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
              
            <li class="nav-item{{ $activePage == 'school-agents' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('cari-sekolah/admin/school-agents') }}">
                    <i class="material-icons">person</i>
                    <p>{{ __('School Agents') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'sub-agents' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('cari-sekolah/admin/sub-agents') }}">
                    <i class="material-icons">person</i>
                    <p>{{ __('Sub Agents') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'marketing' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('cari-sekolah/admin/marketing') }}">
                    <i class="material-icons">person</i>
                    <p>{{ __('Marketings') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'school-agents' ? ' active' : '' }}">
                <a class="nav-link" href="#student-informations-data" data-toggle="collapse" aria-expanded="true">
                    <i class="material-icons">person</i>
                    <p>{{ __('Student Informations') }} <b class="caret"></b></p>
                </a>

                 <div class="collapse {{ ($activeMenu == 'student-informations') ? 'show' : ''}}" id="student-informations-data">
                    <ul class="nav">
                        <!--
                        <li class="nav-item{{ $activePage == 'student-informations-dashboard' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ url('cari-sekolah/admin/student-informations') }}">
                                <i class="material-icons">dashboard</i>
                                <p>{{ __("Dashboard") }}</p>
                            </a>
                        </li>-->
                        <li class="nav-item{{ $activePage == 'students' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ url('cari-sekolah/admin/students') }}">
                                <i class="material-icons">person</i>
                                <p>{{ __("Students") }}</p><!-- english qualification,bank account, personal information, student, school application,payment schedule,insurance-->
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'search-students' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ url('cari-sekolah/admin/search-students') }}">
                                <i class="material-icons">person</i>
                                <p>{{ __("Search Students") }}</p><!-- english qualification,bank account, personal information, student, school application,payment schedule,insurance-->
                            </a>
                        </li>
                  
                        
                    </ul>
                </div>

            </li>
            <li class="nav-item{{ $activePage == 'courses' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('cari-sekolah/admin/courses') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Courses') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'qualifications' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('cari-sekolah/admin/qualifications') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Qualification') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'education-sectors' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('cari-sekolah/admin/education-sectors') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Education Sector') }}</p>
                </a>
            </li>
            
        </ul>
    </div>
</div>
