<?php namespace Modules\CarRental\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\CarRental\Entities\Car\AvailableStatuses;

class AvailableStatusFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AvailableStatuses::class;
    }
}