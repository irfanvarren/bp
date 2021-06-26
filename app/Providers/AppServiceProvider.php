<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Request;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
          // $this->app['request']->server->set('HTTPS', true);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if(\App::environment(['production','local'])) {
         //$url->forceScheme('https');
        }
        if(Request::segment(1) == 'admin'){
            $_admin_route = 'admin';
        if(Request::segment(2) == 'berdayakan'){
        View::share('_menu_template', 'Admin Berdayakan');
         $_admin_route = 'admin-berdayakan';
        
        }
        View::share('_admin_route', $_admin_route);
        }
	 //\Debugbar::disable();//
   }
}
