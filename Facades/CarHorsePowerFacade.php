<?php namespace Modules\CarRental\Facades;


use Illuminate\Support\Facades\Facade;
use Modules\CarRental\Entities\Car\HorsePower;

class CarHorsePowerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return HorsePower::class;
    }
}