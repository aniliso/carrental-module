<?php

namespace Modules\Carrental\Repositories\Eloquent;

use Modules\Carrental\Entities\Car;
use Modules\Carrental\Entities\Car\AvailableStatuses;
use Modules\Carrental\Entities\Helpers\Status;
use Modules\Carrental\Events\Car\CarWasCreated;
use Modules\Carrental\Events\Car\CarWasDeleted;
use Modules\Carrental\Events\Car\CarWasUpdated;
use Modules\Carrental\Repositories\CarRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCarRepository extends EloquentBaseRepository implements CarRepository
{
    public function all()
    {
        return $this->model->with('brand', 'model', 'carclass', 'series')
            ->whereStatus(Status::PUBLISHED)
            ->whereAvailableStatus(AvailableStatuses::READY)
            ->get();
    }

    public function create($data)
    {
        $model = $this->model->create($data);
        event(new CarWasCreated($model, $data));
        return $model;
    }

    public function update($model, $data)
    {
        $model->update($data);
        event(new CarWasUpdated($model, $data));
        return $model;
    }

    public function destroy($model)
    {
        event(new CarWasDeleted($model->id, get_class($model)));
        return parent::destroy($model);
    }

    public function allPaginate($per_page)
    {
        return $this->model->with('brand', 'model', 'carclass', 'series')
            ->whereStatus(Status::PUBLISHED)
            ->whereAvailableStatus(AvailableStatuses::READY)
            ->paginate($per_page);
    }
}
