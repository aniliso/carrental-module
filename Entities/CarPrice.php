<?php

namespace Modules\Carrental\Entities;

use Illuminate\Database\Eloquent\Model;

class CarPrice extends Model
{
    protected $table = 'car__prices';
    protected $fillable = [
        'car_id', 'price1', 'price2', 'price3', 'price4', 'price5', 'price6'
    ];
}
