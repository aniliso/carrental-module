<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group([], function (Router $router) {

    $router->bind('car', function ($id) {
        return app('Modules\Carrental\Repositories\CarRepository')->find($id);
    });

    $router->get(LaravelLocalization::transRoute('carrental::routes.cars'), [
        'uses' => 'PublicController@index',
        'as'   => 'carrental.index'
    ]);

    $router->get(LaravelLocalization::transRoute('carrental::routes.prices'), [
        'uses' => 'PublicController@prices',
        'as'   => 'carrental.prices'
    ]);

    $router->get(LaravelLocalization::transRoute('carrental::routes.reservation'), [
        'uses' => 'PublicController@reservation',
        'as'   => 'carrental.reservation'
    ]);

    $router->put(LaravelLocalization::transRoute('carrental::routes.reservation'), [
        'uses' => 'PublicController@updateReservation',
        'as'   => 'carrental.reservation.update'
    ]);

    $router->post(LaravelLocalization::transRoute('carrental::routes.reservation'), [
        'uses' => 'PublicController@createReservation',
        'as'   => 'carrental.reservation.create'
    ]);
});





