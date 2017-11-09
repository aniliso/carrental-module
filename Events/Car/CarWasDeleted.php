<?php

namespace Modules\Carrental\Events\Car;

use Modules\Media\Contracts\DeletingMedia;

class CarWasDeleted implements DeletingMedia
{
    private $carId;
    private $carClass;

    /**
     * CarWasDeleted constructor.
     * @param $carId
     * @param $carClass
     */
    public function __construct($carId, $carClass)
    {

        $this->carId = $carId;
        $this->carClass = $carClass;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->carId;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return $this->carClass;
    }
}
