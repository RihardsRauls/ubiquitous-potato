<?php

namespace App\Providers;

use App\Services\WeatherService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $weatherService = new WeatherService();
        $rigaTemp = $weatherService->getTemperature('Riga');

        View::share('rigaTemp', $rigaTemp);
    }
}
