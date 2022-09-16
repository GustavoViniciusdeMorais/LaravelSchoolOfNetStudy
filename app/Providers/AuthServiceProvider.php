<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('user-permission', function (User $user) {
            $userPermissions = $user->load('roles.permissions')->roles->transform(function($role){
                return $role->permissions->transform(function($permission){
                    return $permission->name;
                });
            });
            $userPermissions = $userPermissions->first();
            $permissions = isset($userPermissions) ? $userPermissions->toArray() : [];
            return in_array('add_product', $permissions);
        });
    }
}
