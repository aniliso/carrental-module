<?php

namespace Modules\CarRental\Entities;

use Illuminate\Database\Eloquent\Model;

class CarSeries extends Model
{
    protected $table = 'car__series';
    protected $fillable = ['name', 'person', 'baggage'];

    public function Model()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }
}
