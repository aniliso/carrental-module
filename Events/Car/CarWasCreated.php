<?php namespace Modules\Carrental\Events\Car;

use Modules\Media\Contracts\StoringMedia;

class CarWasCreated implements StoringMedia
{
    /**
     * @var
     */
    private $car;
    /**
     * @var array
     */
    private $data;

    public function __construct($car, array $data)
    {
        //
        $this->car = $car;
        $this->data = $data;
    }

    /**
     * Return the entity
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getEntity()
    {
        return $this->car;
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
