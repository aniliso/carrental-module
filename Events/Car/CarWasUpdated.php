<?php namespace Modules\Carrental\Events\Car;

use Modules\Media\Contracts\StoringMedia;
use Modules\Carrental\Entities\Car;

class CarWasUpdated implements StoringMedia
{
    /**
     * @var Car
     */
    private $car;
    /**
     * @var array
     */
    private $data;

    /**
     * CarWasUpdated constructor.
     * @param Car $car
     * @param array $data
     */
    public function __construct(Car $car, array $data)
    {
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
