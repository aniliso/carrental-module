<?php namespace Modules\Carrental\Repositories\Cache;

use Modules\Carrental\Repositories\CarPriceRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCarPriceDecorator extends BaseCacheDecorator implements CarPriceRepository
{
    public function __construct(CarPriceRepository $carprice)
    {
        parent::__construct();
        $this->entityName = 'carrental.carprices';
        $this->repository = $carprice;
    }
}