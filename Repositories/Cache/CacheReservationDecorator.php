<?php

namespace Modules\CarRental\Repositories\Cache;

use Modules\CarRental\Repositories\ReservationRepository;
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
