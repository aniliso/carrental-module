<?php

namespace Modules\CarRental\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class CarClass extends Model
{
    use Translatable;

    protected $table = 'car__classes';
    public $translatedAttributes = ['name', 'slug', 'description', 'content'];
    protected $fillable = ['name', 'slug', 'description', 'content', 'ordering', 'status'];

    public function Cars()
    {
        return $this->hasMany(Car::class, 'class_id');
    }
}
