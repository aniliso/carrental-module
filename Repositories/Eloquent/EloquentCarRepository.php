<?php

namespace Modules\CarRental\Repositories\Eloquent;

use Modules\CarRental\Entities\Car;
use Modules\CarRental\Entities\Car\AvailableStatuses;
use Modules\CarRental\Entities\Helpers\Status;
use Modules\CarRental\Events\Car\CarWasCreated;
use Modules\CarRental\Events\Car\CarWasDeleted;
use Modules\CarRental\Events\Car\CarWasUpdated;
use Modules\CarRental\Repositories\CarRepository;
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
