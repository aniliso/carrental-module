<?php

namespace Modules\CarRental\Repositories\Eloquent;

use Modules\CarRental\Repositories\CarClassRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCarClassRepository extends EloquentBaseRepository implements CarClassRepository
{
    public function all()
    {
        return $this->model->orderBy('ordering', 'asc')->with('translations')->get();
    }
}
