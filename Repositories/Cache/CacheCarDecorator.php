<?php

namespace Modules\CarRental\Repositories\Cache;

use Modules\CarRental\Entities\Car;
use Modules\CarRental\Repositories\CarRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCarDecorator extends BaseCacheDecorator implements CarRepository
{
    public function __construct(CarRepository $car)
    {
        parent::__construct();
        $this->entityName = 'carrental.cars';
        $this->repository = $car;
    }

    public function allPaginate($per_page)
    {
        $page = \Request::has('page') ? \Request::query('page') : 1;
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.allPaginate.{$per_page}.{$page}", $this->cacheTime,
                function () use ($per_page) {
                    return $this->repository->allPaginate($per_page);
                }
            );
    }
}
