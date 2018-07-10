<?php

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

        $permissions = \App\Models\Permission\Permission::all();
        foreach ($permissions as $permission){
            Gate::define($permission->name, function ($user) use ($permission) {
                if ($user->isDeveloper()) {
                    return true;
                } else {
                    return $user->hasPermission($permission->name);
                }
            });
        }
    }
}
