<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{   


    protected $policies = [
        Post::class => PostPolicy::class
    ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('visitAdminPages',function($user){
            return $user->isAdmin === 1;
        });

        Paginator::useBootstrapFive();
        //
    }
}
