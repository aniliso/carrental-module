<?php

namespace Modules\Carrental\Repositories\Cache;

use Modules\Carrental\Repositories\LocationsRepository;
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
