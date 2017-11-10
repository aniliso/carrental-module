<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'carrental'], function (Router $router) {
    $router->get('/model', [
        'as'         => 'api.carrental.model',
        'uses'       => 'CarController@getModels'
    ]);
    $router->get('/series', [
        'as'         => 'api.carrental.series',
        'uses'       => 'CarController@getSeries'
    ]);
});
