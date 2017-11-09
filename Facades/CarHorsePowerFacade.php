<?php namespace Modules\Carrental\Facades;


use Illuminate\Support\Facades\Facade;
use Modules\Carrental\Entities\Car\HorsePower;

class CarHorsePowerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return HorsePower::class;
    }
}