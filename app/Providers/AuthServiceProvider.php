<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Listing;
use App\Policies\ListingPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Listing::class => ListingPolicy::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
