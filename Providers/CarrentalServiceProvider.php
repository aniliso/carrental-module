<?php

namespace Modules\Carrental\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Modules\Carrental\Composers\CarComposer;
use Modules\Carrental\Entities\CarModel;
use Modules\Carrental\Events\Handlers\RegisterCarrentalSidebar;
use Modules\Carrental\Facades\AvailableStatusFacade;
use Modules\Carrental\Facades\CarBodyTypeFacade;
use Modules\Carrental\Facades\CarBrandRepositoryFacade;
use Modules\Carrental\Facades\CarClassRepositoryFacade;
use Modules\Carrental\Facades\CarColorFacade;
use Modules\Carrental\Facades\CarEngineCapacityFacade;
use Modules\Carrental\Facades\CarFuelTypeFacade;
use Modules\Carrental\Facades\CarHorsePowerFacade;
use Modules\Carrental\Facades\CarLocationsFacade;
use Modules\Carrental\Facades\CarTransmissionFacade;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Traits\CanGetSidebarClassForModule;
use Modules\Core\Traits\CanPublishConfiguration;

class CarrentalServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration, CanGetSidebarClassForModule;
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

        $this->app['events']->listen(
            BuildingSidebar::class,
            $this->getSidebarClassForModule('carrental', RegisterCarrentalSidebar::class)
        );

        $this->app->extend('asgard.ModulesList', function($app) {
            array_push($app, 'carrental');
            return $app;
        });

        \Widget::register('carFindByOptions', '\Modules\Carrental\Widgets\CarWidget@findByOptions');
        \Widget::register('carClasses', '\Modules\Carrental\Widgets\CarWidget@getClasses');
        \Widget::register('carBrands', '\Modules\Carrental\Widgets\CarWidget@getBrands');
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
            'Modules\Carrental\Repositories\CarRepository',
            function () {
                $repository = new \Modules\Carrental\Repositories\Eloquent\EloquentCarRepository(new \Modules\Carrental\Entities\Car());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Carrental\Repositories\Cache\CacheCarDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Carrental\Repositories\CarBrandRepository',
            function () {
                $repository = new \Modules\Carrental\Repositories\Eloquent\EloquentCarBrandRepository(new \Modules\Carrental\Entities\CarBrand());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Carrental\Repositories\Cache\CacheCarBrandDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Carrental\Repositories\CarModelRepository',
            function () {
                $repository = new \Modules\Carrental\Repositories\Eloquent\EloquentCarModelRepository(new \Modules\Carrental\Entities\CarModel());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Carrental\Repositories\Cache\CacheCarModelDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Carrental\Repositories\CarSeriesRepository',
            function () {
                $repository = new \Modules\Carrental\Repositories\Eloquent\EloquentCarSeriesRepository(new \Modules\Carrental\Entities\CarSeries());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Carrental\Repositories\Cache\CacheCarSeriesDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Carrental\Repositories\CarClassRepository',
            function () {
                $repository = new \Modules\Carrental\Repositories\Eloquent\EloquentCarClassRepository(new \Modules\Carrental\Entities\CarClass());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Carrental\Repositories\Cache\CacheCarClassDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Carrental\Repositories\CarPriceRepository',
            function () {
                $repository = new \Modules\Carrental\Repositories\Eloquent\EloquentCarPriceRepository(new \Modules\Carrental\Entities\CarPrice());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Carrental\Repositories\Cache\CacheCarPriceDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Carrental\Repositories\LocationsRepository',
            function () {
                $repository = new \Modules\Carrental\Repositories\Eloquent\EloquentLocationsRepository(new \Modules\Carrental\Entities\Locations());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Carrental\Repositories\Cache\CacheLocationsDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Carrental\Repositories\LocationRepository',
            function () {
                $repository = new \Modules\Carrental\Repositories\Eloquent\EloquentLocationRepository(new \Modules\Carrental\Entities\Location());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Carrental\Repositories\Cache\CacheLocationDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Carrental\Repositories\ReservationRepository',
            function () {
                $repository = new \Modules\Carrental\Repositories\Eloquent\EloquentReservationRepository(new \Modules\Carrental\Entities\Reservation());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Carrental\Repositories\Cache\CacheReservationDecorator($repository);
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
