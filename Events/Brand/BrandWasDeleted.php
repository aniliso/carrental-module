<?php

namespace Modules\Carrental\Events\Brand;

use Modules\Media\Contracts\DeletingMedia;

class BrandWasDeleted implements DeletingMedia
{
    private $brandId;
    private $brandClass;

    /**
     * CarWasDeleted constructor.
     * @param $brandId
     * @param $brandClass
     */
    public function __construct($brandId, $brandClass)
    {

        $this->brandId = $brandId;
        $this->brandClass = $brandClass;
    }

    /**
     * Get the entity ID
     * @return int
     */
    public function getEntityId()
    {
        return $this->brandId;
    }

    /**
     * Get the class name the imageables
     * @return string
     */
    public function getClassName()
    {
        return $this->brandClass;
    }
}
