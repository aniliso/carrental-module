<?php namespace Modules\CarRental\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\CarRental\Events\Car\CarWasCreated;
use Modules\CarRental\Events\Car\CarWasDeleted;
use Modules\CarRental\Events\Car\CarWasUpdated;
use Modules\Media\Events\Handlers\HandleMediaStorage;
use Modules\Media\Events\Handlers\RemovePolymorphicLink;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        CarWasUpdated::class => [
            HandleMediaStorage::class
        ],
        CarWasCreated::class => [
            HandleMediaStorage::class
        ],
        CarWasDeleted::class => [
            RemovePolymorphicLink::class
        ]
    ];
}