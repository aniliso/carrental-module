<?php

namespace Modules\Carrental\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Carrental\Entities\Car;
use Modules\Carrental\Entities\CarPrice;
use Modules\Carrental\Http\Requests\Car\CarCreateRequest;
use Modules\Carrental\Http\Requests\Car\CarUpdateRequest;
use Modules\Carrental\Repositories\CarBrandRepository;
use Modules\Carrental\Repositories\CarClassRepository;
use Modules\Carrental\Repositories\CarModelRepository;
use Modules\Carrental\Repositories\CarRepository;
use Modules\Carrental\Repositories\CarSeriesRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Media\Repositories\FileRepository;
use DB;

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
        $cars = $cars->sortBy('brand.name');
        foreach ($cars as $car){
            if($car->prices()->count()==0) {
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
                if($car->prices()->count()==0) {
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
     * @param CarCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(CarCreateRequest $request)
    {
        try {
            DB::transaction(function () use ($request){
                $car = $this->car->create($request->all());

                if($class = $this->carclass->find($request->class_id)) {
                    $car->carclass()->associate($class);
                } else {
                    throw new \Exception('Sınıf Eklenmedi');
                }

                if($brand = $this->carbrand->find($request->brand_id)) {
                    $car->brand()->associate($brand);
                    $car->save();
                } else {
                    throw new \Exception('Marka Eklenmedi');
                }

                if($model = $this->carmodel->find($request->model_id)) {
                    $car->model()->associate($model);
                    $car->save();
                } else {
                    throw new \Exception('Model Eklenmedi');
                }

                if($series = $this->carseries->find($request->series_id)) {
                    $car->series()->associate($series);
                    $car->save();
                } else {
                    throw new \Exception('Seri Eklenmedi');
                }

                if($car->prices()->count()==0) {
                    $price = new CarPrice();
                    $car->prices()->save($price);
                }
            });

            return redirect()->route('admin.carrental.car.index')
                ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('carrental::cars.title.cars')]));
        }
        catch(\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.carrental.car.create')
                ->withError($exception->getMessage());
        }
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
     * @param Car $car
     * @param CarUpdateRequest $request
     * @return mixed
     * @throws \Throwable
     */
    public function update(Car $car, CarUpdateRequest $request)
    {
        try {
            DB::transaction(function() use ($car, $request){

                $this->car->update($car, $request->all());

                if($class = $this->carclass->find($request->class_id)) {
                    $car->carclass()->associate($class);
                } else {
                    throw new \Exception('Sınıf Eklenmedi');
                }

                if($brand = $this->carbrand->find($request->brand_id)) {
                    $car->brand()->associate($brand);
                    $car->save();
                } else {
                    throw new \Exception('Marka Eklenmedi');
                }

                if($model = $this->carmodel->find($request->model_id)) {
                    $car->model()->associate($model);
                    $car->save();
                } else {
                    throw new \Exception('Model Eklenmedi');
                }

                if($series = $this->carseries->find($request->series_id)) {
                    $car->series()->associate($series);
                    $car->save();
                } else {
                    throw new \Exception('Seri Eklenmedi');
                }

                $prices = new CarPrice($request->get('prices'));

                if($car->prices()->count()==0) {
                    $car->prices()->save($prices);
                } else {
                    $car->prices()->update($prices->toArray());
                }

                $car->save();
            });

            return redirect()->route('admin.carrental.car.index')
                ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('carrental::cars.title.cars')]));
        }
        catch (\Exception $exception)
        {
            return redirect()->route('admin.carrental.car.update', $car->id)
                ->withError($exception->getMessage());
        }
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
