<?php namespace Modules\Carrental\Facades;


use Barryvdh\Debugbar\Facade;
use Modules\Carrental\Entities\Car\Color;

class CarColorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Color::class;
    }
}