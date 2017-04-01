<?php namespace Modules\CarRental\Facades;


use Barryvdh\Debugbar\Facade;
use Modules\CarRental\Entities\Car\EngineCapacity;

class CarEngineCapacityFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return EngineCapacity::class;
    }
}