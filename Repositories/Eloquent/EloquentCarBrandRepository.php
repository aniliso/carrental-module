<?php

namespace Modules\Carrental\Repositories\Eloquent;

use Modules\Carrental\Events\Brand\BrandWasCreated;
use Modules\Carrental\Events\Brand\BrandWasDeleted;
use Modules\Carrental\Events\Brand\BrandWasUpdated;
use Modules\Carrental\Repositories\CarBrandRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCarBrandRepository extends EloquentBaseRepository implements CarBrandRepository
{
    public function create($data)
    {
        $model = $this->model->create($data);
        event(new BrandWasCreated($model, $data));
        return $model;
    }

    public function update($model, $data)
    {
        $model->update($data);
        event(new BrandWasUpdated($model, $data));
        return $model;
    }

    public function destroy($model)
    {
        event(new BrandWasDeleted($model->id, get_class($model)));
        return parent::destroy($model);
    }
}
