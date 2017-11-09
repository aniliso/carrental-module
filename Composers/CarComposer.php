<?php namespace Modules\Carrental\Composers;


use Illuminate\View\View;
use Modules\Carrental\Entities\Car\AvailableStatuses;
use Modules\Carrental\Entities\Car\Body;
use Modules\Carrental\Entities\Car\Color;
use Modules\Carrental\Entities\Car\EngineCapacity;
use Modules\Carrental\Entities\Car\Fuel;
use Modules\Carrental\Entities\Car\HorsePower;
use Modules\Carrental\Entities\Car\Transmission;
use Modules\Carrental\Repositories\CarBrandRepository;
use Modules\Carrental\Repositories\CarClassRepository;
use Modules\Carrental\Repositories\CarModelRepository;
use Modules\Carrental\Repositories\CarSeriesRepository;

class CarComposer
{
    /**
     * @var CarBrandRepository
     */
    private $carbrand;
    /**
     * @var CarModelRepository
     */
    private $carmodel;
    /**
     * @var CarSeriesRepository
     */
    private $carseries;
    /**
     * @var Fuel
     */
    private $fuel;
    /**
     * @var Transmission
     */
    private $transmission;
    /**
     * @var Body
     */
    private $body;
    /**
     * @var Color
     */
    private $color;
    /**
     * @var EngineCapacity
     */
    private $engineCapacity;
    /**
     * @var HorsePower
     */
    private $horsePower;
    /**
     * @var AvailableStatuses
     */
    private $availableStatuses;
    /**
     * @var CarClassRepository
     */
    private $carclass;

    /**
     * CarComposer constructor.
     * @param CarBrandRepository $carbrand
     * @param CarModelRepository $carmodel
     * @param CarSeriesRepository $carseries
     */
    public function __construct(
        CarBrandRepository $carbrand,
        CarModelRepository $carmodel,
        CarSeriesRepository $carseries,
        AvailableStatuses $availableStatuses,
        Fuel $fuel,
        Transmission $transmission,
        Body $body,
        Color $color,
        EngineCapacity $engineCapacity,
        HorsePower $horsePower,
        CarClassRepository $carclass
    )
    {
        $this->carbrand = $carbrand;
        $this->carmodel = $carmodel;
        $this->carseries = $carseries;
        $this->fuel = $fuel;
        $this->transmission = $transmission;
        $this->body = $body;
        $this->color = $color;
        $this->engineCapacity = $engineCapacity;
        $this->horsePower = $horsePower;
        $this->availableStatuses = $availableStatuses;
        $this->carclass = $carclass;
    }

    public function compose(View $view)
    {
        $view->with('availableStatuses', $this->availableStatuses->lists());
        $view->with('brandLists', $this->carbrand->all()->pluck('name', 'id')->toArray());
        $view->with('modelLists', $this->carmodel->all()->pluck('name', 'id')->toArray());
        $view->with('seriesLists', $this->carseries->all()->pluck('name', 'id')->toArray());
        $view->with('classLists', $this->carclass->all()->pluck('name', 'id')->toArray());
        $view->with('fuels', $this->fuel->lists());
        $view->with('transmissions', $this->transmission->lists());
        $view->with('body_types', $this->body->lists());
        $view->with('colors', $this->color->lists());
        $view->with('engineCapacities', $this->engineCapacity->lists());
        $view->with('horsePowers', $this->horsePower->lists());
    }
}