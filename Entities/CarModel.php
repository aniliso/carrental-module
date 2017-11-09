<?php

namespace Modules\Carrental\Entities;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'car__models';
    protected $fillable = ['name'];

    public function Brand()
    {
        return $this->belongsTo(CarBrand::class, 'brand_id');
    }

    public function Series()
    {
        return $this->hasMany(CarSeries::class, 'model_id');
    }
}
