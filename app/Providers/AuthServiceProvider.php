<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('boss', function(){
            return Auth::user()->role === 1 ;
        });

        Gate::define('admin', function(){
            return in_array(Auth::user()->role, [1,2]);
        });

        Gate::define('confirm', function(){
            return in_array(Auth::user()->role, [1,2,3]);
        });

        Gate::define('culi', function(){
            return in_array(Auth::user()->role, [1,4]);
        });
    }
}
