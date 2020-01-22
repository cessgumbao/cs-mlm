<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Distributor;
use App\Policies\DistributorPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the ap
     * plication.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('add_members', function ($user) {
            return $user->hasPermission('add_members');
        });

        Gate::define('add_payouts', function ($user) {
            return $user->hasPermission('add_payouts');
        });

        // Gate::define('browse_distributors', function ($user) {
        //     return $user->hasPermission('browse_distributors');
        // });

        // Gate::define('browse_sales', function ($user) {
        //     return $user->hasPermission('browse_sales');
        // });

        // Gate::define('browse_products', function ($user) {
        //     return $user->hasPermission('browse_products');
        // });

        // Gate::define('browse_member_purchases', function ($user) {
        //     return $user->hasPermission('browse_member_purchases');
        // });

        // Gate::define('browse_members', function ($user) {
        //     return $user->hasPermission('browse_members');
        // });
    }
}
