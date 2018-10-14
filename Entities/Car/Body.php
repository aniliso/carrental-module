<?php namespace Modules\Carrental\Entities\Car;


class Body
{
    const CABRIO = 1;
    const COUPE = 2;
    const HATCHBACK_3 = 3;
    const HATCHBACK_5 = 4;
    const SEDAN = 5;
    const STATION_WAGON = 6;
    const SUV = 7;
    const VAN = 8;
    const MINIBUS = 9;

    private $bodies = [];

    public function __construct()
    {
        $this->bodies = [
            self::CABRIO => trans('carrental::cars.form.body_types.cabrio'),
            self::COUPE => trans('carrental::cars.form.body_types.coupe'),
            self::HATCHBACK_3 => trans('carrental::cars.form.body_types.hatchback_3'),
            self::HATCHBACK_5 => trans('carrental::cars.form.body_types.hatchback_5'),
            self::SEDAN => trans('carrental::cars.form.body_types.sedan'),
            self::STATION_WAGON => trans('carrental::cars.form.body_types.station_wagon'),
            self::SUV => trans('carrental::cars.form.body_types.suv'),
            self::VAN => trans('carrental::cars.form.body_types.van'),
            self::MINIBUS => trans('carrental::cars.form.body_types.minibus')
        ];
    }

    public function lists()
    {
        return $this->bodies;
    }

    public function get($bodyId)
    {
        if(isset($bodyId))
        {
            return $this->bodies[$bodyId];
        }
        return $this->bodies[self::SEDAN];
    }
}