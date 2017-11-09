<?php namespace Modules\Carrental\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Carrental\Entities\Car\Body;

class CarBodyTypeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Body::class;
    }
}