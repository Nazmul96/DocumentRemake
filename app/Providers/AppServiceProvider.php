<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer('admin.include.header', function($view) {
            $user_id=Session::get('user_id');   
            $view->with('user_data',User::where('id',$user_id)->first());
        });

        Blade::component('components.backend-breadcrumbs', 'backendBreadcrumbs');
    }
}
