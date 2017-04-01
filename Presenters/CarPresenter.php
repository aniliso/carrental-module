<?php namespace Modules\CarRental\Presenters;

use Laracasts\Presenter\Presenter;

class CarPresenter extends Presenter
{
    public function __construct($entity)
    {
        parent::__construct($entity);
    }

    public function firstImage($width, $height, $mode, $quality)
    {
        if($file = $this->entity->files()->where('zone', 'carImages')->first()) {
            return \Imagy::getImage($file->filename, 'carImage', ['width' => $width, 'height' => $height, 'mode' => $mode, 'quality' => $quality]);
        }
        return placeholdit($width ? $width : 200, $height ? $height : 230, 'Resim+Hazırlanıyor');
    }

    public function images($width, $height, $mode, $quality, $image=4)
    {
        $carImages = [];
        foreach ($this->entity->files()->where('zone', 'carImages')->get()->take($image) as $file)
        {
            $carImages[] = \Imagy::getImage($file->filename, 'carImage', ['width' => $width, 'height' => $height, 'mode' => $mode, 'quality' => $quality]);
        }
        return $carImages;
    }

    public function fuel_type()
    {
        return isset($this->entity->fuel_type) ? \CarFuelType::get($this->entity->fuel_type) : null;
    }

    public function transmission()
    {
        return isset($this->entity->transmission) ? \CarTransmission::get($this->entity->transmission) : null;
    }

    public function body_type()
    {
        return isset($this->entity->body_type) ? \CarBodyType::get($this->entity->body_type) : null;
    }

    public function color()
    {
        return isset($this->entity->color) ? \CarColor::get($this->entity->color) : null;
    }

    public function available_status()
    {
        return isset($this->entity->available_status) ? \CarAvailableStatus::get($this->entity->available_status) : null;
    }

    public function daily_price()
    {
        return number_format($this->entity->daily_price, 2);
    }
}