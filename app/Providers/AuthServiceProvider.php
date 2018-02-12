<?php

namespace Devmus\Providers;

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
        'Devmus\Model' => 'Devmus\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // gates 

        Gate::resource('posts', 'Devmus\Policies\PostPolicy');



        // User
        Gate::define('users.create', 'Devmus\Policies\PostPolicy@UserCreate');
        Gate::define('users.update', 'Devmus\Policies\PostPolicy@UserUpdate');
        Gate::define('users.delete', 'Devmus\Policies\PostPolicy@UserDelete');

        // Role
        Gate::define('users.role', 'Devmus\Policies\PostPolicy@role');
        
        // Permission
        Gate::define('users.permission', 'Devmus\Policies\PostPolicy@permission');

        Gate::define('posts.tag', 'Devmus\Policies\PostPolicy@tag');
        
        Gate::define('posts.category', 'Devmus\Policies\PostPolicy@category');
    }
}
