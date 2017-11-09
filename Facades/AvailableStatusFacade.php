<?php namespace Modules\Carrental\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Carrental\Entities\Car\AvailableStatuses;

class AvailableStatusFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AvailableStatuses::class;
    }
}