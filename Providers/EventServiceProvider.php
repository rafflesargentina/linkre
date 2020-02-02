<?php

namespace Raffles\Modules\Linkre\Providers;

use Raffles\Modules\Linkre\Models\User;
use Raffles\Modules\Linkre\Observers\UserObserver;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //User::observe(UserObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
