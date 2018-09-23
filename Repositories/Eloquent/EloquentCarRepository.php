<?php

namespace Modules\Carrental\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Carrental\Entities\Car\AvailableStatuses;
use Modules\Carrental\Events\Car\CarWasCreated;
use Modules\Carrental\Events\Car\CarWasDeleted;
use Modules\Carrental\Events\Car\CarWasUpdated;
use Modules\Carrental\Repositories\CarRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCarRepository extends EloquentBaseRepository implements CarRepository
{
    public function all()
    {
        return $this->model->with('brand', 'model', 'carclass', 'series')->get();
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

    public function allPaginate($per_page, $status=1, $sort=[])
    {
        $model = $this->model
            ->select(['*'])
            ->whereStatus($status)
            ->whereAvailableStatus(AvailableStatuses::READY);

        if(@$sort['category'])
            $model->whereHas('carclass', function (Builder $q) use ($sort){
               $q->where('id', $sort['category']);
            });

        if(@$sort['brand'])
            $model->whereHas('brand', function (Builder $q) use ($sort){
                $q->where('id', $sort['brand']);
            });

        if(is_array($sort) && @$sort['dir']) {
            switch ($sort['sort']) {
                case 'price':
                    $model->leftJoin('car__prices as prices', 'id', '=', 'prices.car_id')
                          ->orderBy('prices.price1', $sort['dir']);
                    break;
                case 'name':
                    $model->orderBy('brand_id', $sort['dir']);
                    break;
            }
        }

        return $model->with(['brand', 'model', 'carclass', 'series', 'prices'])->paginate($per_page);
    }
}
