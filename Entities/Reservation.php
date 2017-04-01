<?php

namespace Modules\CarRental\Entities;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\CarRental\Presenters\ReservationPresenter;

class Reservation extends Model
{
    use PresentableTrait;

    protected $table = 'car__reservations';
    protected $fillable = [
        'tc_no',
        'first_name',
        'last_name',
        'email',
        'phone',
        'mobile_phone',
        'flight_name',
        'flight_no',
        'requests',
        'start_location',
        'return_location',
        'pick_at',
        'drop_at',
        'total_day',
        'daily_price',
        'total_price',
        'car_id'
    ];
    protected $dates = ['pick_at', 'drop_at'];
    protected $presenter = ReservationPresenter::class;

    public function Car()
    {
        return $this->hasOne(Car::class, 'id', 'car_id');
    }

    public function Pickup()
    {
        return $this->hasOne(Location::class, 'start_location');
    }

    public function DropOff()
    {
        return $this->hasOne(Location::class, 'return_location');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name. ' ' . $this->last_name;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($reservation){
           $reservation->total_price = $reservation->daily_price * $reservation->total_day;
        });
    }
}
