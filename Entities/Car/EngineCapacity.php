<?php namespace Modules\Carrental\Entities\Car;

class EngineCapacity
{
    const M1200 = 1;
    const L1201M1400 = 2;
    const L1401M1600 = 3;
    const L1601M1800 = 4;
    const L1801M2000 = 5;
    const L2001M2500 = 6;
    const L2501M3000 = 7;
    const L3001M3500 = 8;
    const L3501M4000 = 9;
    const L4001M4500 = 10;
    const L4501M5000 = 11;
    const L5001M5500 = 12;
    const M6000 = 13;

    private $engineCapacities;

    public function __construct()
    {
        $this->engineCapacities = [
            self::M1200      => "< 1200cc",
            self::L1201M1400 => "1201 - 1400cc",
            self::L1601M1800 => "1601 - 1800cc",
            self::L1801M2000 => "1801 - 2000cc",
            self::L2001M2500 => "2001 - 2500cc",
            self::L2501M3000 => "2501 - 3000cc",
            self::L3001M3500 => "3001 - 3500cc",
            self::L3501M4000 => "3501 - 4000cc",
            self::L4001M4500 => "4001 - 4500cc",
            self::L4501M5000 => "4501 - 5000cc",
            self::L5001M5500 => "5001 - 5500cc",
            self::M6000      => "> 6000cc"
        ];
    }

    public function lists()
    {
        return $this->engineCapacities;
    }

    public function get($capacityId)
    {
        if(isset($capacityId)) {
            return $this->engineCapacities[$capacityId];
        }
        return $this->engineCapacities[self::M1200];
    }
}