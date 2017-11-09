<?php namespace Modules\Carrental\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Carrental\Repositories\LocationRepository;

class CarLocationsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return LocationRepository::class;
    }
}