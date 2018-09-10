<?php

namespace Modules\Carrental\Repositories\Cache;

use Modules\Carrental\Entities\Car;
use Modules\Carrental\Repositories\CarRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCarDecorator extends BaseCacheDecorator implements CarRepository
{
    public function __construct(CarRepository $car)
    {
        parent::__construct();
        $this->entityName = 'carrental.cars';
        $this->repository = $car;
    }

    public function allPaginate($per_page, $status=1, $sort=[])
    {
        $page = \Request::has('page') ? \Request::query('page') : 1;
        $sort_cache = implode(',', $sort);
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.allPaginate.{$per_page}.{$page}.{$status}.{$sort_cache}", $this->cacheTime,
                function () use ($per_page, $status, $sort) {
                    return $this->repository->allPaginate($per_page, $status, $sort);
                }
            );
    }
}
