<?php

namespace App\Providers;

use App\Model\BasicInfo;
use App\Model\Social;
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
            $config = BasicInfo::first();
            $socials = Social::where('status', 1)->orderBy('created_at', 'asc')->get();
            $view->with('basic', $config);
            $view->with('socials', $socials);
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
