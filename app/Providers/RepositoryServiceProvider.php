<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\MemberRepositoryInterface', 
            'App\Repositories\MemberRepository'
        );
        
        $this->app->bind(
            'App\Repositories\Interfaces\SaleRepositoryInterface', 
            'App\Repositories\SaleRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
