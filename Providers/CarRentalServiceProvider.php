<?php

namespace Modules\CarRental\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Modules\CarRental\Composers\CarComposer;
use Modules\CarRental\Entities\CarModel;
use Modules\CarRental\Facades\AvailableStatusFacade;
use Modules\CarRental\Facades\CarBodyTypeFacade;
use Modules\CarRental\Facades\CarBrandRepositoryFacade;
use Modules\CarRental\Facades\CarClassRepositoryFacade;
use Modules\CarRental\Facades\CarColorFacade;
use Modules\CarRental\Facades\CarEngineCapacityFacade;
use Modules\CarRental\Facades\CarFuelTypeFacade;
use Modules\CarRental\Facades\CarHorsePowerFacade;
use Modules\CarRental\Facades\CarLocationsFacade;
use Modules\CarRental\Facades\CarTransmissionFacade;
use Modules\Core\Traits\CanPublishConfiguration;

class CarRentalServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->registerFacades();
    }

    public function boot()
    {
        $this->publishConfig('carrental', 'permissions');
        $this->publishConfig('carrental', 'config');

		$this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        view()->composer('carrental::*', CarComposer::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\CarRental\Repositories\CarRepository',
            function () {
                $repository = new \Modules\CarRental\Repositories\Eloquent\EloquentCarRepository(new \Modules\CarRental\Entities\Car());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\CarRental\Repositories\Cache\CacheCarDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\CarRental\Repositories\CarBrandRepository',
            function () {
                $repository = new \Modules\CarRental\Repositories\Eloquent\EloquentCarBrandRepository(new \Modules\CarRental\Entities\CarBrand());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\CarRental\Repositories\Cache\CacheCarBrandDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\CarRental\Repositories\CarModelRepository',
            function () {
                $repository = new \Modules\CarRental\Repositories\Eloquent\EloquentCarModelRepository(new \Modules\CarRental\Entities\CarModel());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\CarRental\Repositories\Cache\CacheCarModelDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\CarRental\Repositories\CarSeriesRepository',
            function () {
                $repository = new \Modules\CarRental\Repositories\Eloquent\EloquentCarSeriesRepository(new \Modules\CarRental\Entities\CarSeries());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\CarRental\Repositories\Cache\CacheCarSeriesDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\CarRental\Repositories\CarClassRepository',
            function () {
                $repository = new \Modules\CarRental\Repositories\Eloquent\EloquentCarClassRepository(new \Modules\CarRental\Entities\CarClass());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\CarRental\Repositories\Cache\CacheCarClassDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\CarRental\Repositories\CarPriceRepository',
            function () {
                $repository = new \Modules\CarRental\Repositories\Eloquent\EloquentCarPriceRepository(new \Modules\CarRental\Entities\CarPrice());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\CarRental\Repositories\Cache\CacheCarPriceDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\CarRental\Repositories\LocationsRepository',
            function () {
                $repository = new \Modules\CarRental\Repositories\Eloquent\EloquentLocationsRepository(new \Modules\CarRental\Entities\Locations());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\CarRental\Repositories\Cache\CacheLocationsDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\CarRental\Repositories\LocationRepository',
            function () {
                $repository = new \Modules\CarRental\Repositories\Eloquent\EloquentLocationRepository(new \Modules\CarRental\Entities\Location());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\CarRental\Repositories\Cache\CacheLocationDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\CarRental\Repositories\ReservationRepository',
            function () {
                $repository = new \Modules\CarRental\Repositories\Eloquent\EloquentReservationRepository(new \Modules\CarRental\Entities\Reservation());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\CarRental\Repositories\Cache\CacheReservationDecorator($repository);
            }
        );
    }

    private function registerFacades()
    {
        $aliasLoader = AliasLoader::getInstance();

        $aliasLoader->alias('CarAvailableStatus', AvailableStatusFacade::class);
        $aliasLoader->alias('CarBodyType', CarBodyTypeFacade::class);
        $aliasLoader->alias('CarColor', CarColorFacade::class);
        $aliasLoader->alias('CarEngineCapacity', CarEngineCapacityFacade::class);
        $aliasLoader->alias('CarFuelType', CarFuelTypeFacade::class);
        $aliasLoader->alias('CarHorsePower', CarHorsePowerFacade::class);
        $aliasLoader->alias('CarTransmission', CarTransmissionFacade::class);

        $aliasLoader->alias('CarClassRepository', CarClassRepositoryFacade::class);
        $aliasLoader->alias('CarBrandRepository', CarBrandRepositoryFacade::class);
        $aliasLoader->alias('CarLocationRepository', CarLocationsFacade::class);
    }
}
