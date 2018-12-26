<?php namespace Modules\Carrental\Widgets;


use Modules\Carrental\Repositories\CarBrandRepository;
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
    /**
     * @var CarBrandRepository
     */
    private $carBrands;

    public function __construct(CarRepository $car, CarClassRepository $carClass, CarBrandRepository $carBrands)
    {
        $this->car = $car;
        $this->carClass = $carClass;
        $this->carBrands = $carBrands;
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

    public function getBrands($view='brands')
    {
        $brands = $this->carBrands->all();
        return view('carrental::widgets.'.$view, compact('brands'));
    }

    public function getCarByClass($limit=6, $view='class')
    {
        $cars = collect();
        $classes = $this->carClass->all()->sortBy('ordering');
        foreach ($classes as $class) {
            $cars->put($class->id, $this->car->getByAttributes(['class_id'=>$class->id])->sortBy('ordering')->take($limit));
        }
        return view('carrental::widgets.'.$view, compact('classes', 'cars'));
    }
}