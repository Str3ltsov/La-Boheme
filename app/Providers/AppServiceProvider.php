<?php

namespace App\Providers;

use App\Services\FiztrenService;
use App\Services\FiztrenServiceInterface;
use App\Services\ReservationsService;
use App\Services\ReservationsServiceInterface;
use App\Services\ReservationService;
use App\Services\ReservationServiceInterface;
use App\Services\VyrtrenassService;
use App\Services\VyrtrenassServiceInterface;
use App\Services\VyrtrenServiceInterface;
use App\Services\VyrtrenService;
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
        //Change public path to htdocs
//        $this->app->bind('path.public', function() {
//           return base_path('public_html/rezervuok/public');
//        });

        //Binding interfaces with service classes
        $this->app->bind(
            ReservationServiceInterface::class,
            ReservationService::class
        );
        $this->app->bind(
            ReservationsServiceInterface::class,
            ReservationsService::class
        );
        $this->app->bind(
            VyrtrenassServiceInterface::class,
            VyrtrenassService::class
        );
        $this->app->bind(
            FiztrenServiceInterface::class,
            FiztrenService::class
        );
        $this->app->bind(
            VyrtrenServiceInterface::class,
            VyrtrenService::class
        );

        //Changes public path to htdocs in production
        /*$this->app->bind('path.public', function() {
           return base_path('htdocs');
        });*/
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
