<?php  namespace Modules\CarRental\Entities\Car;


class Fuel
{
    const GASOLINE = 1;
    const GASOLINE_LPG = 2;
    const DIESEL = 3;
    const ELECTRICAL = 4;
    const HYBRID_GASOLINE = 5;
    const HYBRID_DIESEL = 6;

    private $fuels = [];

    public function __construct()
    {
        $this->fuels = [
          self::GASOLINE => trans('carrental::cars.form.fuel_types.gasoline'),
          self::GASOLINE_LPG => trans('carrental::cars.form.fuel_types.gasoline_lpg'),
          self::DIESEL => trans('carrental::cars.form.fuel_types.diesel'),
          self::ELECTRICAL => trans('carrental::cars.form.fuel_types.electrical'),
          self::HYBRID_GASOLINE => trans('carrental::cars.form.fuel_types.hybrid_gasoline'),
          self::HYBRID_DIESEL => trans('carrental::cars.form.fuel_types.hybrid_diesel'),
        ];
    }

    public function lists()
    {
        return $this->fuels;
    }

    public function get($fuelId)
    {
        if(isset($fuelId))
        {
            return $this->fuels[$fuelId];
        }
        return $this->fuels[self::GASOLINE];
    }
}