<?php

namespace Modules\CarRental\Entities;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'car__locations';
    protected $fillable = ['name'];
}
