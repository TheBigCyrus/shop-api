<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\permission;
use App\Models\User;
use Illuminate\Database\Connection;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Support\DeferrableProvider;

class AuthServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
     /*    Gate::define('view-dashboard' , function (User $user){
            return $user->role->hasPermission('view-dashboard');
         });*/

        if (Schema::hasTable('permissions')) {
        foreach (Permission::with('roles')->get() as $permission) {

            Gate::define($permission->title, function ($user) use ($permission) {
                return $user->role->hasPermission($permission->title);
            });
        }
    }



    }


//    public function getPermissions(): \Illuminate\Database\Eloquent\Collection|array
//    {
//        return Permission::with('roles')->get();
//    }
}
