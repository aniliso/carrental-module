<?php

namespace Modules\CarRental\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\CarRental\Entities\CarSeries;
use Modules\CarRental\Repositories\CarModelRepository;
use Modules\CarRental\Repositories\CarSeriesRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CarSeriesController extends AdminBaseController
{
    /**
     * @var CarSeriesRepository
     */
    private $carseries;
    /**
     * @var CarModelRepository
     */
    private $carmodel;

    public function __construct(
        CarSeriesRepository $carseries,
        CarModelRepository $carmodel
    )
    {
        parent::__construct();

        $this->carseries = $carseries;
        $this->carmodel = $carmodel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $carseries = $this->carseries->all();

        return view('carrental::admin.carseries.index', compact('carseries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('carrental::admin.carseries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $series = $this->carseries->create($request->all());
        if($model = $this->carmodel->find($request->model_id)) {
            $series->model()->associate($model);
            $series->save();
        }

        return redirect()->route('admin.carrental.carseries.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('carrental::carseries.title.carseries')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CarSeries $carseries
     * @return Response
     */
    public function edit(CarSeries $carseries)
    {
        return view('carrental::admin.carseries.edit', compact('carseries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CarSeries $carseries
     * @param  Request $request
     * @return Response
     */
    public function update(CarSeries $carseries, Request $request)
    {
        $this->carseries->update($carseries, $request->all());

        return redirect()->route('admin.carrental.carseries.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('carrental::carseries.title.carseries')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CarSeries $carseries
     * @return Response
     */
    public function destroy(CarSeries $carseries)
    {
        $this->carseries->destroy($carseries);

        return redirect()->route('admin.carrental.carseries.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('carrental::carseries.title.carseries')]));
    }
}
