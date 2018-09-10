<?php

namespace Modules\Carrental\Entities;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Carrental\Entities\Car\AvailableStatuses;
use Modules\Carrental\Entities\Helpers\Status;
use Modules\Carrental\Presenters\CarPresenter;
use Modules\Media\Support\Traits\MediaRelation;

class Car extends Model
{
    use MediaRelation, PresentableTrait;

    protected $table = 'car__cars';
    protected $fillable = [
        'plate_no',
        'model_year',
        'chassis_no',
        'motor_no',
        'current_km',
        'max_km',
        'period_km',
        'current_fuel',
        'identity_no',
        'tax_no',
        'license_key',
        'license_no',
        'licensed_at',
        'fuel_type',
        'transmission',
        'body_type',
        'color',
        'engine_capacity',
        'horsepower',
        'description',
        'available_status',
        'status',
        'settings'
    ];

    protected $dates = ['licensed_at'];

    protected $presenter = CarPresenter::class;

    public function Prices()
    {
        return $this->hasOne(CarPrice::class, 'car_id');
    }

    public function Brand()
    {
        return $this->belongsTo(CarBrand::class, 'brand_id');
    }

    public function Model()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function Series()
    {
        return $this->belongsTo(CarSeries::class, 'series_id');
    }

    public function CarClass()
    {
        return $this->belongsTo(CarClass::class, 'class_id')->with('translations');
    }

    public function getImagesAttribute()
    {
        return $this->files()->where('zone', 'carImages')->get();
    }

    public function getFirstImageAttribute()
    {
        return $this->files()->where('zone', 'carImages')->first();
    }

    public function scopeActive($query)
    {
        return $query->where('status', Status::PUBLISHED);
    }

    public function scopeAvailable($query)
    {
        return $query->where('available_status', AvailableStatuses::READY);
    }

    public function getFullNameAttribute()
    {
        return $this->brand->name . ' ' . $this->model->name;
    }

    public function findPriceForDay(Car $car, $day_range) {
        switch($day_range) {
            case $day_range <= 3:
                $price = $car->prices->price1;
                break;
            case $day_range <= 7:
                $price = $car->prices->price2;
                break;
            case $day_range <= 14:
                $price = $car->prices->price3;
                break;
            case $day_range <= 20:
                $price = $car->prices->price4;
                break;
            case $day_range <= 28:
                $price = $car->prices->price5;
                break;
            case $day_range > 28:
                $price = $car->prices->price6;
                break;
            default:
                $price = $car->prices->price1;
        }
        return $price;
    }

    public function setSettingsAttribute($value)
    {
        return $this->attributes['settings'] = json_encode($value);
    }

    public function getSettingsAttribute()
    {
        $settings = json_decode($this->attributes['settings']);
        return $settings;
    }

    public function scopeStatus()
    {
        return $this->whereStatus(Status::PUBLISHED);
    }

    public function scopeAvailableStatus()
    {
        return $this->whereAvailableStatus(AvailableStatuses::READY);
    }

    public function getReservationUrlAttribute()
    {
        return route('carrental.reservation');
    }

    public function getUrlAttribute()
    {
        return route('carrental.car', [str_slug($this->brand->name.' '.$this->model->name.' '.$this->series->name, '-'), $this->id]);
    }
}
