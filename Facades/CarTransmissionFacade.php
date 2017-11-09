<?php namespace Modules\Carrental\Facades;


use Illuminate\Support\Facades\Facade;
use Modules\Carrental\Entities\Car\Transmission;

class CarTransmissionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Transmission::class;
    }
}