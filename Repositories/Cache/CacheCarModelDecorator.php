<?php

namespace Modules\CarRental\Repositories\Cache;

use Modules\CarRental\Repositories\CarModelRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCarModelDecorator extends BaseCacheDecorator implements CarModelRepository
{
    public function __construct(CarModelRepository $carmodel)
    {
        parent::__construct();
        $this->entityName = 'carrental.carmodels';
        $this->repository = $carmodel;
    }
}
