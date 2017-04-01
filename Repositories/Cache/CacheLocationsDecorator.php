<?php

namespace Modules\CarRental\Repositories\Cache;

use Modules\CarRental\Repositories\LocationsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheLocationsDecorator extends BaseCacheDecorator implements LocationsRepository
{
    public function __construct(LocationsRepository $locations)
    {
        parent::__construct();
        $this->entityName = 'carrental.locations';
        $this->repository = $locations;
    }
}
