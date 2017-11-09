<?php

namespace Modules\Carrental\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Carrental\Entities\CarModel;
use Modules\Carrental\Repositories\CarBrandRepository;
use Modules\Carrental\Repositories\CarModelRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CarModelController extends AdminBaseController
{
    /**
     * @var CarModelRepository
     */
    private $carmodel;
    /**
     * @var CarBrandRepository
     */
    private $carbrand;

    public function __construct(CarModelRepository $carmodel, CarBrandRepository $carbrand)
    {
        parent::__construct();

        $this->carmodel = $carmodel;
        $this->carbrand = $carbrand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $carmodels = $this->carmodel->all();

        return view('carrental::admin.carmodels.index', compact('carmodels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('carrental::admin.carmodels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $model = $this->carmodel->create($request->all());
        if($brand = $this->carbrand->find($request->brand_id)) {
            $model->brand()->associate($brand);
            $model->save();
        }

        return redirect()->route('admin.carrental.carmodel.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('carrental::carmodels.title.carmodels')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CarModel $carmodel
     * @return Response
     */
    public function edit(CarModel $carmodel)
    {
        return view('carrental::admin.carmodels.edit', compact('carmodel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CarModel $carmodel
     * @param  Request $request
     * @return Response
     */
    public function update(CarModel $carmodel, Request $request)
    {
        $this->carmodel->update($carmodel, $request->all());
        if($brand = $this->carbrand->find($request->brand_id)) {
            $carmodel->brand()->associate($brand);
            $carmodel->save();
        }

        return redirect()->route('admin.carrental.carmodel.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('carrental::carmodels.title.carmodels')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CarModel $carmodel
     * @return Response
     */
    public function destroy(CarModel $carmodel)
    {
        $this->carmodel->destroy($carmodel);

        return redirect()->route('admin.carrental.carmodel.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('carrental::carmodels.title.carmodels')]));
    }
}
