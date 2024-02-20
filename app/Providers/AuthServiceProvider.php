<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
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
        Gate::define("admin-usuario", function (User $user) {
            return $user->roles()->whereIn("roles.id", [1, 2])->exists();
        });
        Gate::define("admin-sesion", function (User $user) {
            return $user->roles()->whereIn("roles.id", [1, 2])->exists();
        });
        Gate::define("votante", function (User $user) {
            return $user->roles()->whereIn("roles.id", [3])->exists();
        });
        Gate::define("observador", function (User $user) {
            return $user->roles()->whereIn("roles.id", [4,5])->exists();
        });
        //
    }
}
