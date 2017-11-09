<?php

namespace Modules\Carrental\Repositories\Cache;

use Modules\Carrental\Repositories\LocationRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheLocationDecorator extends BaseCacheDecorator implements LocationRepository
{
    public function __construct(LocationRepository $location)
    {
        parent::__construct();
        $this->entityName = 'carrental.locations';
        $this->repository = $location;
    }
}
