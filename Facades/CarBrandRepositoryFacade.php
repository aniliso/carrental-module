<?php namespace Modules\Carrental\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Carrental\Repositories\CarBrandRepository;

class CarBrandRepositoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CarBrandRepository::class;
    }
}