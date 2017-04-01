<?php

namespace Modules\CarRental\Repositories\Cache;

use Modules\CarRental\Repositories\CarBrandRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCarBrandDecorator extends BaseCacheDecorator implements CarBrandRepository
{
    public function __construct(CarBrandRepository $carbrand)
    {
        parent::__construct();
        $this->entityName = 'carrental.carbrands';
        $this->repository = $carbrand;
    }
}
