<?php

namespace App\Providers;

use App\Services\ReservationsService;
use App\Services\ReservationsServiceInterface;
use App\Services\ReservationService;
use App\Services\ReservationServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ReservationServiceInterface::class,
            ReservationService::class
        );
        $this->app->bind(
            ReservationsServiceInterface::class,
            ReservationsService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
