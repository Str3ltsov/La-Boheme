<?php

namespace App\Providers;

use App\Services\HallsService;
use App\Services\HallsServiceInterface;
use App\Services\ReservationsService;
use App\Services\ReservationsServiceInterface;
use App\Services\ReservationService;
use App\Services\ReservationServiceInterface;
use App\Services\TablesService;
use App\Services\TablesServiceInterface;
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
        $this->app->bind(
            TablesServiceInterface::class,
            TablesService::class
        );
        $this->app->bind(
            HallsServiceInterface::class,
            HallsService::class
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
