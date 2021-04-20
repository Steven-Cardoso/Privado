<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

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
        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin', 'garcon']);
        });
        Gate::define('edit-users', function($user){
            return $user->hasAnyRoles(['admin', 'cozinheiro']);
        });
        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });
        Gate::define('cozinheiro-user', function($user){
            return $user->hasRole('cozinheiro');
        });
        Gate::define('garcon-user', function($user){
            return $user->hasRole('garcon');
        });
        Passport::routes();

    }
}
