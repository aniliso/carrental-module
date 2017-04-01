<?php namespace Modules\CarRental\Entities\Car;


class AvailableStatuses
{
    const READY = 1;
    const DELIVERY = 2;
    const SELL = 3;
    const SERVICE = 4;

    private $statuses = [];

    public function __construct()
    {
        $this->statuses = [
          self::READY => trans('carrental::cars.form.available_statuses.ready'),
          self::DELIVERY => trans('carrental::cars.form.available_statuses.delivery'),
          self::SELL => trans('carrental::cars.form.available_statuses.sell'),
          self::SERVICE => trans('carrental::cars.form.available_statuses.service')
        ];
    }

    public function lists()
    {
        return $this->statuses;
    }

    public function get($statusId)
    {
        if(isset($statusId)) {
            return $this->statuses[$statusId];
        }
        return $this->statuses[self::READY];
    }
}