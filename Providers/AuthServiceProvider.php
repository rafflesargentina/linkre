<?php

namespace Raffles\Modules\Linkre\Providers;

use Raffles\Modules\Linkre\Models\Investment;
use Raffles\Modules\Linkre\Policies\InvestmentPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Investment::class => InvestmentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
