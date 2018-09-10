<?php namespace Modules\Carrental\Widgets;


use Modules\Carrental\Repositories\CarClassRepository;
use Modules\Carrental\Repositories\CarRepository;

class CarWidget
{
    /**
     * @var CarRepository
     */
    private $car;
    /**
     * @var CarClassRepository
     */
    private $carClass;

    public function __construct(CarRepository $car, CarClassRepository $carClass)
    {
        $this->car = $car;
        $this->carClass = $carClass;
    }

    public function findByOptions($option='', $view='option')
    {
        $cars = $this->car->all()->where($option, 1);
        return view('carrental::widgets.'.$view, compact('cars'));
    }

    public function getClasses($view='classes')
    {
        $classes = $this->carClass->all();
        return view('carrental::widgets.'.$view, compact('classes'));
    }
}