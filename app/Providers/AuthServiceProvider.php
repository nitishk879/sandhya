<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
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

        Gate::define('admin', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('can-access-user', function ($user) {
            return $user->id === $user->id OR $user->isAdmin();
        });

        Gate::define('can-edit-user', function ($user) {
            return $user->id === $user->id;
        });

        Gate::define('can-modify-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });
        Gate::define('check-hotel', function ($user) {
            return $user->isHotelManager() or $user->isAdmin();
        });
        Gate::define('update-hotel', function ($user, $hotel) {
            return $user->id === $hotel->user_id OR $user->isAdmin();
        });
    }
}
