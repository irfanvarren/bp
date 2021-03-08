
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
          <a class="nav-link" href="{{ url('/admin') }}">
            <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
          </a>
        </li>
        <li class="nav-item {{ ($activeMenu == 'cms' || $activeMenu == 'content-management' || $activeMenu =='home-management') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#cms" aria-expanded="true">
            <i class="material-icons">widgets</i>
            <p>{{ __('Website Contents') }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse {{ ($activeMenu == 'content-management' || $activeMenu =='home-management') ? 'show' : ''}}" id="cms">

            <ul class="nav">
              @can('admin-cms.menu')
              <li class="nav-item{{ $activePage == 'menus' ? ' active' : '' }}">
                <a class="nav-link" href="{{url('admin/menus')}}">
                  <span class="sidebar-mini"> M </span>
                  <span class="sidebar-normal">{{ __('Menu') }} </span>
                </a>
              </li>
              @endcan
              @can('admin-cms.page-groups')
              <li class="nav-item{{ $activePage == 'page-group' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('admin/cms/page-group') }}">
                  <span class="sidebar-mini"> PG </span>
                  <span class="sidebar-normal">{{ __('Page Groups') }} </span>
                </a>
              </li>
              @endcan
              @can('admin-cms.pages')
              <li class="nav-item{{ $activePage == 'pages' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('admin/cms/pages') }}">
                  <span class="sidebar-mini"> P </span>
                  <span class="sidebar-normal">{{ __('Pages') }} </span>
                </a>
              </li>
              @endcan
              @can('admin-cms.pages')
              <li class="nav-item{{ $activePage == 'form' ? ' active' : '' }}">
                <a class="nav-link" href="{{ url('admin/form') }}">
                  <span class="sidebar-mini"> F </span>
                  <span class="sidebar-normal">{{ __('Form') }} </span>
                </a>
              </li>
              @endcan
              @can('admin-cms.email-templates')
              <li class="nav-item{{ $activePage == 'email-templates' ? ' active' : '' }}">
                <a class="nav-link" href="{{url('admin/cms/email-templates')}}">
                  <span class="sidebar-mini"> ET </span>
                  <span class="sidebar-normal">{{ __('Email Templates') }} </span>
                </a>
              </li>
              @endcan
                  <!--<li class="nav-item{{ $activePage == 'page-contents' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/cms/page-contents') }}">
                      <span class="sidebar-mini"> PS </span>
                      <span class="sidebar-normal">{{ __('Page Contents') }} </span>
                    </a>
                  </li>-->
                  @can('admin-cms.home')
                  <li class="nav-item{{ $activePage == 'home' ? ' active' : '' }}">
                    <a class="nav-link" data-toggle="collapse" href="#home" aria-expanded="true">
                      <span class="sidebar-mini"> H </span>
                      <span class="sidebar-normal">{{ __('Home') }}   <b class="caret"></b></span>


                    </a>
                    <div class="collapse {{ ($activeMenu == 'home-management') ? 'show' : ''}}" id="home">
                      <ul class="nav">
                        <li class="nav-item{{ $activePage == 'cms.banner' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ url('admin/banner') }}">
                            <span class="sidebar-mini"> B </span>

                            <span class="sidebar-normal">{{ __('Banner') }} </span>
                          </a>
                        </li>
                      </div>
                    </li>
                    @endcan
                    @can('admin-cms.page-contents')
                    <li class="nav-item{{ $activePage == 'page-contents' ? ' active' : '' }}">
                      <a class="nav-link" data-toggle="collapse" href="#page-contents" aria-expanded="true">
                        <span class="sidebar-mini"> PC </span>
                        <span class="sidebar-normal">{{ __('Page Content') }}   <b class="caret"></b></span>


                      </a>
                      <div class="collapse {{ ($activeMenu == 'content-management') ? 'show' : ''}}" id="page-contents">
                        <ul class="nav">
                          <li class="nav-item{{ $activePage == 'page-contents' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ url('admin/page-contents') }}">
                              <span class="sidebar-mini"> PC </span>

                              <span class="sidebar-normal">{{ __('Page Contents') }} </span>
                            </a>
                          </li>
                          <li class="nav-item{{ $activePage == 'cms.products' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ url('admin/cms/products') }}">
                              <span class="sidebar-mini"> PR </span>

                              <span class="sidebar-normal">{{ __('Products') }} </span>
                            </a>
                          </li>
                        </div>
                      </li>
                      @endcan
                    </ul>
                  </div>
                </li>

                @role('Super Admin')
                <li class="nav-item {{ ($activePage == 'users' || $activePage == 'user-management') ? ' active' : '' }}">
                  <a class="nav-link" data-toggle="collapse" href="#user-menu" aria-expanded="true">
                    <i class="material-icons">person</i>
                    <p>{{ __('User') }}
                      <b class="caret"></b>
                    </p>
                  </a>
                  <div class="collapse {{ ($activeMenu == 'users-management') ? 'show' : ''}}" id="user-menu">
                    <ul class="nav">
                      <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/users') }}">
                          <span class="sidebar-mini"> U </span>
                          <span class="sidebar-normal">{{ __('Users') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/roles') }}">
                          <span class="sidebar-mini"> R </span>
                          <span class="sidebar-normal">{{ __('Roles') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'permissions' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/permissions') }}">
                          <span class="sidebar-mini"> P </span>
                          <span class="sidebar-normal">{{ __('Permissions') }} </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                @endrole
                @role('Admin|Super Admin')

                <li class="nav-item {{ ($activePage == 'english-regis' || $activePage == 'data-management' || $activeMenu == 'company-data') ? ' active' : '' }}">
                  <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                    <p>{{ __('Admin') }}
                      <b class="caret"></b>
                    </p>
                  </a>
                  <div class="collapse {{ ($activeMenu == 'product-management' || $activeMenu == 'company-data') ? 'show' : ''}}" id="laravelExample">
                    <ul class="nav">
                      @role('Admin|Super Admin')
                      <li class="nav-item{{ $activePage == 'products' ? ' active' : '' }}">
                        <a class="nav-link" href="#data-products" data-toggle="collapse" aria-expanded="true">
                          <span class="sidebar-mini"> P </span>
                          <span class="sidebar-normal">{{ __('Products') }}  <b class="caret"></b></span>
                        </a>
                        <div class="collapse {{ ($activeMenu == 'data-management') ? 'show' : ''}}" id="data-products">
                          <ul class="nav">
                            <li class="nav-item{{ $activePage == 'pricelist' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ url('admin/products/pricelists') }}">
                                <span class="sidebar-mini"> Pr </span>
                                <span class="sidebar-normal">{{ __('Pricelists') }} </span>
                              </a>
                            </li>
                            <li class="nav-item{{ $activePage == 'pricelist' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ url('admin/products/course-packets') }}">
                                <span class="sidebar-mini"> CP </span>
                                <span class="sidebar-normal">{{ __('Course Packet') }} </span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      @endrole
                      @role('Admin|Super Admin|Staff')
                      <li class="nav-item{{ $activeMenu == 'company-data' ? ' active' : '' }}">
                        <a class="nav-link" href="#data-companies" data-toggle="collapse" aria-expanded="true">
                          <span class="sidebar-mini"> CD </span>
                          <span class="sidebar-normal">{{ __('Companies Data') }}  <b class="caret"></b></span>
                        </a>
                        <div class="collapse {{ ($activeMenu == 'company-data') ? 'show' : ''}}" id="data-companies">
                          <ul class="nav">
                            
                            <li class="nav-item{{ $activePage == 'briefing' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ url('admin/company-data/briefing') }}">
                                <span class="sidebar-mini"> B </span>
                                <span class="sidebar-normal">{{ __('Briefing') }} </span>
                              </a>
                            </li>
                            <li class="nav-item{{ $activePage == 'companies' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ url('admin/company-data/companies') }}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal">{{ __('Companies') }} </span>
                              </a>
                            </li>
                            <li class="nav-item{{ $activePage == 'divisions' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ url('admin/company-data/divisions') }}">
                                <span class="sidebar-mini"> D </span>
                                <span class="sidebar-normal">{{ __('Divisions') }} </span>
                              </a>
                            </li>
                            <li class="nav-item{{ $activePage == 'rule-categories' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ url('admin/company-data/rule-categories') }}">
                                <span class="sidebar-mini"> RC </span>
                                <span class="sidebar-normal">{{ __('Rule Categories') }} </span>
                              </a>
                            </li>
                            <li class="nav-item{{ $activePage == 'rules' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ url('admin/company-data/rules') }}">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal">{{ __('Company Rules') }} </span>
                              </a>
                            </li>
                            @role('Super Admin|Head Admission|Director')
                            <li class="nav-item{{ $activePage == 'sk-types' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ url('admin/company-data/sk-types') }}">
                                <span class="sidebar-mini"> JSK </span>
                                <span class="sidebar-normal">{{ __('Jenis SK') }} </span>
                              </a>
                            </li>
                            <li class="nav-item{{ $activePage == 'sk' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ url('admin/company-data/sk') }}">
                                <span class="sidebar-mini"> SK </span>
                                <span class="sidebar-normal">{{ __('SK') }} </span>
                              </a>
                            </li>
                            <li class="nav-item{{ $activePage == 'contracts' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ url('admin/company-data/contracts') }}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal">{{ __('Contract') }} </span>
                              </a>
                            </li>
                            @endrole

                            <li class="nav-item{{ $activePage == 'employees' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ url('admin/company-data/employees') }}">
                                <span class="sidebar-mini"> E </span>
                                <span class="sidebar-normal">{{ __('Employees') }} </span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      @endrole
                      <li class="nav-item{{ $activePage == 'registration-data' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/registration-data') }}">
                          <span class="sidebar-mini"> RD </span>
                          <span class="sidebar-normal">{{ __('Registration Data') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'ot-registration' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/online-test-registration') }}">
                          <span class="sidebar-mini"> OTD </span>
                          <span class="sidebar-normal">{{ __('Online Test Registration') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'contact-us' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/contact-us') }}">
                          <span class="sidebar-mini"> CU </span>
                          <span class="sidebar-normal">{{ __('Contact Us') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'enquiry' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/enquiry') }}">
                          <span class="sidebar-mini"> Eq </span>
                          <span class="sidebar-normal">{{ __('Enquiry') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'portfolio' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/portfolio') }}">
                          <span class="sidebar-mini"> PO </span>
                          <span class="sidebar-normal">{{ __('Portfolio') }} </span>
                        </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'events' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ url('admin/events') }}">
                          <span class="sidebar-mini"> Ev </span>
                          <span class="sidebar-normal">{{ __('Events') }} </span>
                        </a>
                      </li>
                <!--  <li class="nav-item{{ $activePage == 'event-types' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/event-types') }}">
                      <span class="sidebar-mini"> ET</span>
                      <span class="sidebar-normal">{{ __('Events Types') }} </span>
                    </a>
                  </li>-->
                  @canany('admin.news.*')
                  <li class="nav-item{{ $activePage == 'news' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/news') }}">
                      <span class="sidebar-mini"> N </span>
                      <span class="sidebar-normal">{{ __('News') }} </span>
                    </a>
                  </li>
                  @endcan
                  <li class="nav-item{{ $activePage == 'promo' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/promo') }}">
                      <span class="sidebar-mini"> P </span>
                      <span class="sidebar-normal">{{ __('Promo') }} </span>
                    </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'testimony' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/testimony') }}">
                      <span class="sidebar-mini"> T </span>
                      <span class="sidebar-normal">{{ __('Testimony') }} </span>
                    </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'students' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/students') }}">
                      <span class="sidebar-mini"> S </span>
                      <span class="sidebar-normal">{{ __('Students') }} </span>
                    </a>
                  </li>
                  <li class="nav-item{{ $activePage == 'merchant' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/merchant') }}">
                      <span class="sidebar-mini"> M </span>
                      <span class="sidebar-normal">{{ __('Merchant') }} </span>
                    </a>
                  </li>
                  @role('Admin|Super Admin')
                  <li class="nav-item{{ $activePage == 'visa-requirements' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ url('admin/visa-requirements') }}">
                      <span class="sidebar-mini"> VR </span>
                      <span class="sidebar-normal">{{ __('Visa Requirements') }} </span>
                    </a>
                  </li>
                  @endrole
                </ul>
              </div>
            </li>
            @endrole
          </ul>
        </div>
      </div>
