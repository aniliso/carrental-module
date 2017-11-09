<?php

namespace Modules\Carrental\Entities;

use Illuminate\Database\Eloquent\Model;

class CarClassTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug', 'description', 'content'];
    protected $table = 'car__class_translations';
}
