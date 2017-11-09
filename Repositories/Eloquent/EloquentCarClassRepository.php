<?php

namespace Modules\Carrental\Repositories\Eloquent;

use Modules\Carrental\Repositories\CarClassRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCarClassRepository extends EloquentBaseRepository implements CarClassRepository
{
    public function all()
    {
        return $this->model->orderBy('ordering', 'asc')->with('translations')->get();
    }
}
