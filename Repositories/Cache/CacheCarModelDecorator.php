<?php

namespace Modules\Carrental\Repositories\Cache;

use Modules\Carrental\Repositories\CarModelRepository;
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
