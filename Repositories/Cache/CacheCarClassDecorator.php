<?php

namespace Modules\Carrental\Repositories\Cache;

use Modules\Carrental\Repositories\CarClassRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCarClassDecorator extends BaseCacheDecorator implements CarClassRepository
{
    public function __construct(CarClassRepository $carclass)
    {
        parent::__construct();
        $this->entityName = 'carrental.carclasses';
        $this->repository = $carclass;
    }
}
