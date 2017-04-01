<?php namespace Modules\CarRental\Facades;


use Barryvdh\Debugbar\Facade;
use Modules\CarRental\Entities\Car\Color;

class CarColorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Color::class;
    }
}