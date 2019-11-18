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

        Gate::define('browse_distributors', function ($user) {
            return $user->hasPermission('browse_distributors');
        });

        Gate::define('browse_sales', function ($user) {
            return $user->hasPermission('browse_sales');
        });
    }
}
