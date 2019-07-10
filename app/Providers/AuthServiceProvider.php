<?php
// Copyright (c) 2019 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('allow_system', function ($user) {
            return ($user->role === \Config::get('role.system'));
        });

        Gate::define('allow_admin', function ($user) {
            return ($user->role > 0 && $user->role <= \Config::get('role.admin'));
        });

        Gate::define('allow_general', function ($user) {
            return ($user->role > 0 && $user->role <= \Config::get('role.general'));
        });
    }
}
