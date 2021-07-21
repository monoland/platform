<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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
        Gate::guessPolicyNamesUsing(function ($modelClass) {
            // if (Str::of($modelClass)->contains('Notifications\\DatabaseNotification')) {
            //     return 'App\\Policies\\MyAccount\\NotificationPolicy';
            // }

            if ($modelClass === 'App\\Models\\User') {
                return 'App\\Policies\\System\\UserPolicy';
            }

            return 'App\\Policies\\' . Str::of($modelClass)->after('App\\Models\\') . 'Policy';
        });
    }
}
