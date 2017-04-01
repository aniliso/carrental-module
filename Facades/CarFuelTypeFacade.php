<?php namespace Modules\CarRental\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\CarRental\Entities\Car\Fuel;

class CarFuelTypeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Fuel::class;
    }
}