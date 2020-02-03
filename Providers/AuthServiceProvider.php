<?php

namespace Raffles\Modules\Linkre\Providers;

use Raffles\Models\Article;
use Raffles\Modules\Linkre\Models\{ Company, Developer, Document, Investment, Investor, Promoter, Report };
use Raffles\Modules\Linkre\Policies\{ ArticlePolicy, CompanyPolicy, DeveloperPolicy, DocumentPolicy, InvestmentPolicy, InvestorPolicy, PromoterPolicy, ReportPolicy };

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Company::class => CompanyPolicy::class,
        Developer::class => DeveloperPolicy::class,
        Document::class => DocumentPolicy::class,
        Investment::class => InvestmentPolicy::class,
        Investor::class => InvestorPolicy::class,
        Promoter::class => PromoterPolicy::class,
        Report::class => ReportPolicy::class,
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
