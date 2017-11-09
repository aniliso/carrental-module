<?php namespace Modules\Carrental\Facades;


use Barryvdh\Debugbar\Facade;
use Modules\Carrental\Entities\Car\EngineCapacity;

class CarEngineCapacityFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return EngineCapacity::class;
    }
}