<?php namespace Modules\Carrental\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Carrental\Entities\Car\Fuel;

class CarFuelTypeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Fuel::class;
    }
}