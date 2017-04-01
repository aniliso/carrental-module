<?php namespace Modules\CarRental\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\CarRental\Repositories\LocationRepository;

class CarLocationsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return LocationRepository::class;
    }
}