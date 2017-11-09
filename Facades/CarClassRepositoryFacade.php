<?php namespace Modules\Carrental\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Carrental\Repositories\CarClassRepository;
use Modules\Carrental\Repositories\CarModelRepository;

class CarClassRepositoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CarClassRepository::class;
    }
}