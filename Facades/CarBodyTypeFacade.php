<?php namespace Modules\CarRental\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\CarRental\Entities\Car\Body;

class CarBodyTypeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Body::class;
    }
}