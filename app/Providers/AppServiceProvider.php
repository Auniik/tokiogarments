<?php

namespace App\Providers;

use App\Model\SiteConfiguration;
use App\Model\Social;
use App\Model\Menu;
use \Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('frontend._partial.app', function($view)
        {
            $config = SiteConfiguration::first();
            $socials = Social::where('status', 1)->orderBy('created_at', 'asc')->get();
            $menus = Menu::orderBy('serial', 'asc')->get();
            $submenus = Menu::orderBy('serial', 'asc')->get();

            $view->with('basic', $config);
            $view->with('socials', $socials);
            $view->with('menus', $menus);
            $view->with('submenus', $submenus);
        });

        View::composer('frontend.contact', function($view)
        {
            $config = SiteConfiguration::first();
            $view->with('basic', $config);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
