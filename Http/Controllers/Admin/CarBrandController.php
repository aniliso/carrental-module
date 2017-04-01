<?php

namespace Modules\CarRental\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\CarRental\Entities\CarBrand;
use Modules\CarRental\Repositories\CarBrandRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CarBrandController extends AdminBaseController
{
    /**
     * @var CarBrandRepository
     */
    private $carbrand;

    public function __construct(CarBrandRepository $carbrand)
    {
        parent::__construct();

        $this->carbrand = $carbrand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $carbrands = $this->carbrand->all();

        return view('carrental::admin.carbrands.index', compact('carbrands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('carrental::admin.carbrands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->carbrand->create($request->all());

        return redirect()->route('admin.carrental.carbrand.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('carrental::carbrands.title.carbrands')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CarBrand $carbrand
     * @return Response
     */
    public function edit(CarBrand $carbrand)
    {
        return view('carrental::admin.carbrands.edit', compact('carbrand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CarBrand $carbrand
     * @param  Request $request
     * @return Response
     */
    public function update(CarBrand $carbrand, Request $request)
    {
        $this->carbrand->update($carbrand, $request->all());

        return redirect()->route('admin.carrental.carbrand.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('carrental::carbrands.title.carbrands')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CarBrand $carbrand
     * @return Response
     */
    public function destroy(CarBrand $carbrand)
    {
        $this->carbrand->destroy($carbrand);

        return redirect()->route('admin.carrental.carbrand.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('carrental::carbrands.title.carbrands')]));
    }
}
