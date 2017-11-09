<?php

namespace Modules\Carrental\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class CarBrand extends Model
{
    use MediaRelation;

    protected $table = 'car__brands';
    protected $fillable = ['name', 'slug'];

    public function Models()
    {
        return $this->hasOne(CarModel::class, 'model_id');
    }
}
