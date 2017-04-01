<?php namespace Modules\CarRental\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\CarRental\Repositories\CarBrandRepository;

class CarBrandRepositoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CarBrandRepository::class;
    }
}