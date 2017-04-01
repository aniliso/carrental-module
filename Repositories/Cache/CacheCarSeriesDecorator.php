<?php

namespace Modules\CarRental\Repositories\Cache;

use Modules\CarRental\Repositories\CarSeriesRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCarSeriesDecorator extends BaseCacheDecorator implements CarSeriesRepository
{
    public function __construct(CarSeriesRepository $carseries)
    {
        parent::__construct();
        $this->entityName = 'carrental.carseries';
        $this->repository = $carseries;
    }
}
