<?php

namespace Modules\CarRental\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\CarRental\Entities\Car;
use Modules\CarRental\Entities\CarPrice;
use Modules\CarRental\Http\Requests\Car\CarCreateRequest;
use Modules\CarRental\Http\Requests\Car\CarUpdateRequest;
use Modules\CarRental\Repositories\CarBrandRepository;
use Modules\CarRental\Repositories\CarClassRepository;
use Modules\CarRental\Repositories\CarModelRepository;
use Modules\CarRental\Repositories\CarRepository;
use Modules\CarRental\Repositories\CarSeriesRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Media\Repositories\FileRepository;

class CarController extends AdminBaseController
{
    /**
     * @var CarRepository
     */
    private $car;
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
     * @var FileRepository
     */
    private $file;
    /**
     * @var CarClassRepository
     */
    private $carclass;

    public function __construct(
        CarRepository $car,
        CarBrandRepository $carbrand,
        CarModelRepository $carmodel,
        CarSeriesRepository $carseries,
        CarClassRepository $carclass,
        FileRepository $file
    )
    {
        parent::__construct();

        $this->car = $car;
        $this->carbrand = $carbrand;
        $this->carmodel = $carmodel;
        $this->carseries = $carseries;
        $this->file = $file;
        $this->carclass = $carclass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cars = $this->car->all();

        return view('carrental::admin.cars.index', compact('cars'));
    }

    public function prices()
    {
        $cars = $this->car->all();
        foreach ($cars as $car){
            if(!count($car->prices)) {
                $car->prices()->save(new CarPrice());
            }
        }
        return view('carrental::admin.cars.prices', compact('cars'));
    }

    public function updatePrices(Request $request)
    {
        $inputs = $request->except(['_token']);
        foreach ($inputs as $key => $prices) {
            if($car = $this->car->find($key)) {
               if(!count($car->prices)) {
                   $prices = new CarPrice($prices);
                   $car->prices()->save($prices);
               } else {
                   $car->prices()->update($prices);
               }
            }
        }
        return redirect()->route('admin.carrental.car.prices')
            ->withSuccess(trans('core::core.messages.prices updated'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('carrental::admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(CarCreateRequest $request)
    {
        $car = $this->car->create($request->all());

        if($class = $this->carclass->find($request->class_id)) {
            $car->carclass()->associate($class);
        }
        if($brand = $this->carbrand->find($request->brand_id)) {
            $car->brand()->associate($brand);
            $car->save();
        }
        if($model = $this->carmodel->find($request->model_id)) {
            $car->model()->associate($model);
            $car->save();
        }
        if($series = $this->carmodel->find($request->series_id)) {
            $car->series()->associate($series);
            $car->save();
        }
        if(!count($car->prices)) {
            $price = new CarPrice();
            $car->prices()->save($price);
        }

        return redirect()->route('admin.carrental.car.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('carrental::cars.title.cars')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Car $car
     * @return Response
     */
    public function edit(Car $car)
    {
        return view('carrental::admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Car $car
     * @param  Request $request
     * @return Response
     */
    public function update(Car $car, CarUpdateRequest $request)
    {
        $this->car->update($car, $request->all());

        if($class = $this->carclass->find($request->class_id)) {
            $car->carclass()->associate($class);
        }
        if($brand = $this->carbrand->find($request->brand_id)) {
            $car->brand()->associate($brand);
        }
        if($model = $this->carmodel->find($request->model_id)) {
            $car->model()->associate($model);
        }
        if($series = $this->carmodel->find($request->series_id)) {
            $car->series()->associate($series);
        }

        $prices = new CarPrice($request->get('prices'));
        if(!count($car->prices)) {
            $car->prices()->save($prices);
        } else {
            $car->prices()->update($prices->toArray());
        }

        $car->save();

        return redirect()->route('admin.carrental.car.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('carrental::cars.title.cars')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Car $car
     * @return Response
     */
    public function destroy(Car $car)
    {
        $this->car->destroy($car);

        return redirect()->route('admin.carrental.car.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('carrental::cars.title.cars')]));
    }
}
