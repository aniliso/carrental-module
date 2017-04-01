<?php

namespace Modules\CarRental\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface CarRepository extends BaseRepository
{
    public function allPaginate($per_page);
}
