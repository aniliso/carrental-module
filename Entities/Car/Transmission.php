<?php namespace Modules\Carrental\Entities\Car;


class Transmission
{
    const MANUAL = 1;
    const AUTOMATIC = 2;
    const SEMIAUTOMATIC = 3;

    private $transmissions = [];

    public function __construct()
    {
        $this->transmissions = [
          self::MANUAL => trans('carrental::cars.form.transmissions.manual'),
          self::AUTOMATIC => trans('carrental::cars.form.transmissions.automatic'),
          self::SEMIAUTOMATIC => trans('carrental::cars.form.transmissions.semiautomatic')
        ];
    }

    public function lists()
    {
        return $this->transmissions;
    }

    public function get($transmissionId)
    {
        if(isset($transmissionId))
        {
            return $this->transmissions[$transmissionId];
        }
        return $this->transmissions[self::MANUAL];
    }
}