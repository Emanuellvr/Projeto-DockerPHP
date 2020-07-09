<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

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

        Gate::define('only-admin', function (){
            
            if (Auth::guard('admin')->check() && Str::contains(URL::current(), 'admin')){
                return true;
            }
 
            return false;
 
        });

        Gate::define('no-admin', function (){
            
            if (Auth::guard('admin')->check() && Str::contains(URL::current(), 'admin')){
                return false;
            }
 
            return true;
 
        });

    }
}
