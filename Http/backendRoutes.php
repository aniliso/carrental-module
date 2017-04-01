<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/carrental'], function (Router $router) {

    $router->bind('car', function ($id) {
        return app('Modules\CarRental\Repositories\CarRepository')->find($id);
    });
    $router->get('cars', [
        'as' => 'admin.carrental.car.index',
        'uses' => 'CarController@index',
        'middleware' => 'can:carrental.cars.index'
    ]);
    $router->get('cars/create', [
        'as' => 'admin.carrental.car.create',
        'uses' => 'CarController@create',
        'middleware' => 'can:carrental.cars.create'
    ]);
    $router->post('cars', [
        'as' => 'admin.carrental.car.store',
        'uses' => 'CarController@store',
        'middleware' => 'can:carrental.cars.create'
    ]);
    $router->get('cars/{car}/edit', [
        'as' => 'admin.carrental.car.edit',
        'uses' => 'CarController@edit',
        'middleware' => 'can:carrental.cars.edit'
    ]);
    $router->put('cars/{car}', [
        'as' => 'admin.carrental.car.update',
        'uses' => 'CarController@update',
        'middleware' => 'can:carrental.cars.edit'
    ]);
    $router->delete('cars/{car}', [
        'as' => 'admin.carrental.car.destroy',
        'uses' => 'CarController@destroy',
        'middleware' => 'can:carrental.cars.destroy'
    ]);

    $router->get('prices', [
        'as' => 'admin.carrental.car.prices',
        'uses' => 'CarController@prices',
        'middleware' => 'can:carrental.cars.prices'
    ]);

    $router->put('prices', [
        'as' => 'admin.carrental.car.updatePrices',
        'uses' => 'CarController@updatePrices',
        'middleware' => 'can:carrental.cars.updatePrices'
    ]);

    $router->bind('carbrand', function ($id) {
        return app('Modules\CarRental\Repositories\CarBrandRepository')->find($id);
    });
    $router->get('carbrands', [
        'as' => 'admin.carrental.carbrand.index',
        'uses' => 'CarBrandController@index',
        'middleware' => 'can:carrental.carbrands.index'
    ]);
    $router->get('carbrands/create', [
        'as' => 'admin.carrental.carbrand.create',
        'uses' => 'CarBrandController@create',
        'middleware' => 'can:carrental.carbrands.create'
    ]);
    $router->post('carbrands', [
        'as' => 'admin.carrental.carbrand.store',
        'uses' => 'CarBrandController@store',
        'middleware' => 'can:carrental.carbrands.create'
    ]);
    $router->get('carbrands/{carbrand}/edit', [
        'as' => 'admin.carrental.carbrand.edit',
        'uses' => 'CarBrandController@edit',
        'middleware' => 'can:carrental.carbrands.edit'
    ]);
    $router->put('carbrands/{carbrand}', [
        'as' => 'admin.carrental.carbrand.update',
        'uses' => 'CarBrandController@update',
        'middleware' => 'can:carrental.carbrands.edit'
    ]);
    $router->delete('carbrands/{carbrand}', [
        'as' => 'admin.carrental.carbrand.destroy',
        'uses' => 'CarBrandController@destroy',
        'middleware' => 'can:carrental.carbrands.destroy'
    ]);

    $router->bind('carmodel', function ($id) {
        return app('Modules\CarRental\Repositories\CarModelRepository')->find($id);
    });
    $router->get('carmodels', [
        'as' => 'admin.carrental.carmodel.index',
        'uses' => 'CarModelController@index',
        'middleware' => 'can:carrental.carmodels.index'
    ]);
    $router->get('carmodels/create', [
        'as' => 'admin.carrental.carmodel.create',
        'uses' => 'CarModelController@create',
        'middleware' => 'can:carrental.carmodels.create'
    ]);
    $router->post('carmodels', [
        'as' => 'admin.carrental.carmodel.store',
        'uses' => 'CarModelController@store',
        'middleware' => 'can:carrental.carmodels.create'
    ]);
    $router->get('carmodels/{carmodel}/edit', [
        'as' => 'admin.carrental.carmodel.edit',
        'uses' => 'CarModelController@edit',
        'middleware' => 'can:carrental.carmodels.edit'
    ]);
    $router->put('carmodels/{carmodel}', [
        'as' => 'admin.carrental.carmodel.update',
        'uses' => 'CarModelController@update',
        'middleware' => 'can:carrental.carmodels.edit'
    ]);
    $router->delete('carmodels/{carmodel}', [
        'as' => 'admin.carrental.carmodel.destroy',
        'uses' => 'CarModelController@destroy',
        'middleware' => 'can:carrental.carmodels.destroy'
    ]);

    $router->bind('carseries', function ($id) {
        return app('Modules\CarRental\Repositories\CarSeriesRepository')->find($id);
    });
    $router->get('carseries', [
        'as' => 'admin.carrental.carseries.index',
        'uses' => 'CarSeriesController@index',
        'middleware' => 'can:carrental.carseries.index'
    ]);
    $router->get('carseries/create', [
        'as' => 'admin.carrental.carseries.create',
        'uses' => 'CarSeriesController@create',
        'middleware' => 'can:carrental.carseries.create'
    ]);
    $router->post('carseries', [
        'as' => 'admin.carrental.carseries.store',
        'uses' => 'CarSeriesController@store',
        'middleware' => 'can:carrental.carseries.create'
    ]);
    $router->get('carseries/{carseries}/edit', [
        'as' => 'admin.carrental.carseries.edit',
        'uses' => 'CarSeriesController@edit',
        'middleware' => 'can:carrental.carseries.edit'
    ]);
    $router->put('carseries/{carseries}', [
        'as' => 'admin.carrental.carseries.update',
        'uses' => 'CarSeriesController@update',
        'middleware' => 'can:carrental.carseries.edit'
    ]);
    $router->delete('carseries/{carseries}', [
        'as' => 'admin.carrental.carseries.destroy',
        'uses' => 'CarSeriesController@destroy',
        'middleware' => 'can:carrental.carseries.destroy'
    ]);
    $router->bind('carclass', function ($id) {
        return app('Modules\CarRental\Repositories\CarClassRepository')->find($id);
    });
    $router->get('carclasses', [
        'as' => 'admin.carrental.carclass.index',
        'uses' => 'CarClassController@index',
        'middleware' => 'can:carrental.carclasses.index'
    ]);
    $router->get('carclasses/create', [
        'as' => 'admin.carrental.carclass.create',
        'uses' => 'CarClassController@create',
        'middleware' => 'can:carrental.carclasses.create'
    ]);
    $router->post('carclasses', [
        'as' => 'admin.carrental.carclass.store',
        'uses' => 'CarClassController@store',
        'middleware' => 'can:carrental.carclasses.create'
    ]);
    $router->get('carclasses/{carclass}/edit', [
        'as' => 'admin.carrental.carclass.edit',
        'uses' => 'CarClassController@edit',
        'middleware' => 'can:carrental.carclasses.edit'
    ]);
    $router->put('carclasses/{carclass}', [
        'as' => 'admin.carrental.carclass.update',
        'uses' => 'CarClassController@update',
        'middleware' => 'can:carrental.carclasses.edit'
    ]);
    $router->delete('carclasses/{carclass}', [
        'as' => 'admin.carrental.carclass.destroy',
        'uses' => 'CarClassController@destroy',
        'middleware' => 'can:carrental.carclasses.destroy'
    ]);

    $router->bind('location', function ($id) {
        return app('Modules\CarRental\Repositories\LocationRepository')->find($id);
    });
    $router->get('locations', [
        'as' => 'admin.carrental.location.index',
        'uses' => 'LocationController@index',
        'middleware' => 'can:carrental.locations.index'
    ]);
    $router->get('locations/create', [
        'as' => 'admin.carrental.location.create',
        'uses' => 'LocationController@create',
        'middleware' => 'can:carrental.locations.create'
    ]);
    $router->post('locations', [
        'as' => 'admin.carrental.location.store',
        'uses' => 'LocationController@store',
        'middleware' => 'can:carrental.locations.create'
    ]);
    $router->get('locations/{location}/edit', [
        'as' => 'admin.carrental.location.edit',
        'uses' => 'LocationController@edit',
        'middleware' => 'can:carrental.locations.edit'
    ]);
    $router->put('locations/{location}', [
        'as' => 'admin.carrental.location.update',
        'uses' => 'LocationController@update',
        'middleware' => 'can:carrental.locations.edit'
    ]);
    $router->delete('locations/{location}', [
        'as' => 'admin.carrental.location.destroy',
        'uses' => 'LocationController@destroy',
        'middleware' => 'can:carrental.locations.destroy'
    ]);
    $router->bind('reservation', function ($id) {
        return app('Modules\CarRental\Repositories\ReservationRepository')->find($id);
    });
    $router->get('reservations', [
        'as' => 'admin.carrental.reservation.index',
        'uses' => 'ReservationController@index',
        'middleware' => 'can:carrental.reservations.index'
    ]);
    $router->get('reservations/create', [
        'as' => 'admin.carrental.reservation.create',
        'uses' => 'ReservationController@create',
        'middleware' => 'can:carrental.reservations.create'
    ]);
    $router->post('reservations', [
        'as' => 'admin.carrental.reservation.store',
        'uses' => 'ReservationController@store',
        'middleware' => 'can:carrental.reservations.create'
    ]);
    $router->get('reservations/{reservation}/edit', [
        'as' => 'admin.carrental.reservation.edit',
        'uses' => 'ReservationController@edit',
        'middleware' => 'can:carrental.reservations.edit'
    ]);
    $router->put('reservations/{reservation}', [
        'as' => 'admin.carrental.reservation.update',
        'uses' => 'ReservationController@update',
        'middleware' => 'can:carrental.reservations.edit'
    ]);
    $router->delete('reservations/{reservation}', [
        'as' => 'admin.carrental.reservation.destroy',
        'uses' => 'ReservationController@destroy',
        'middleware' => 'can:carrental.reservations.destroy'
    ]);
// append




});
