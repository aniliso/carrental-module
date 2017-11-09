<?php namespace Modules\Carrental\Events\Brand;

use Modules\Carrental\Entities\CarBrand;
use Modules\Media\Contracts\StoringMedia;

class BrandWasUpdated implements StoringMedia
{
    /**
     * @var array
     */
    private $data;
    /**
     * @var CarBrand
     */
    private $brand;

    /**
     * CarWasUpdated constructor.
     * @param CarBrand $car
     * @param array $data
     */
    public function __construct(CarBrand $brand, array $data)
    {
        $this->brand = $brand;
        $this->data = $data;
        $this->brand = $brand;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->brand;
    }

    /**
     * Return the ALL data sent
     * @return array
     */
    public function getSubmissionData()
    {
        return $this->data;
    }
}
