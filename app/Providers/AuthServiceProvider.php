<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
//use App\Models\Listing;
//use App\Policies\ListingPolicy;
use App\Models\Vehicle;
use App\Policies\VehiclePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        //Listing::class => ListingPolicy::class,
        Vehicle::class => VehiclePolicy::class,
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
