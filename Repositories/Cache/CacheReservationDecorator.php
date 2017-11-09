<?php

namespace Modules\Carrental\Repositories\Cache;

use Modules\Carrental\Repositories\ReservationRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheReservationDecorator extends BaseCacheDecorator implements ReservationRepository
{
    public function __construct(ReservationRepository $reservation)
    {
        parent::__construct();
        $this->entityName = 'carrental.reservations';
        $this->repository = $reservation;
    }
}
