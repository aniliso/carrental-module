<?php namespace Modules\CarRental\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\CarRental\Repositories\CarClassRepository;
use Modules\CarRental\Repositories\CarModelRepository;

class CarClassRepositoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CarClassRepository::class;
    }
}