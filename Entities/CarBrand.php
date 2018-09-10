<?php

namespace Modules\Carrental\Entities;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Carrental\Presenters\BrandPresenter;
use Modules\Media\Support\Traits\MediaRelation;

class CarBrand extends Model
{
    use MediaRelation, PresentableTrait;

    protected $table = 'car__brands';
    protected $fillable = ['name', 'slug'];

    protected $presenter = BrandPresenter::class;

    public function Models()
    {
        return $this->hasOne(CarModel::class, 'model_id');
    }
}
