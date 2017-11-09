<?php namespace Modules\Carrental\Events\Brand;

use Modules\Media\Contracts\StoringMedia;

class BrandWasCreated implements StoringMedia
{
    /**
     * @var
     */
    private $brand;
    /**
     * @var array
     */
    private $data;

    public function __construct($brand, array $data)
    {
        //
        $this->brand = $brand;
        $this->data = $data;
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
