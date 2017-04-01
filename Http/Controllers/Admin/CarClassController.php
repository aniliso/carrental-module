<?php

namespace Modules\CarRental\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\CarRental\Entities\CarClass;
use Modules\CarRental\Http\Requests\CarClass\CreateCarClassRequest;
use Modules\CarRental\Http\Requests\CarClass\UpdateCarClassRequest;
use Modules\CarRental\Repositories\CarClassRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CarClassController extends AdminBaseController
{
    /**
     * @var CarClassRepository
     */
    private $carclass;

    public function __construct(CarClassRepository $carclass)
    {
        parent::__construct();

        $this->carclass = $carclass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $carclasses = $this->carclass->all();

        return view('carrental::admin.carclasses.index', compact('carclasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('carrental::admin.carclasses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(CreateCarClassRequest $request)
    {
        $this->carclass->create($request->all());

        return redirect()->route('admin.carrental.carclass.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('carrental::carclasses.title.carclasses')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CarClass $carclass
     * @return Response
     */
    public function edit(CarClass $carclass)
    {
        return view('carrental::admin.carclasses.edit', compact('carclass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CarClass $carclass
     * @param  Request $request
     * @return Response
     */
    public function update(CarClass $carclass, UpdateCarClassRequest $request)
    {
        $this->carclass->update($carclass, $request->all());

        return redirect()->route('admin.carrental.carclass.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('carrental::carclasses.title.carclasses')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CarClass $carclass
     * @return Response
     */
    public function destroy(CarClass $carclass)
    {
        $this->carclass->destroy($carclass);

        return redirect()->route('admin.carrental.carclass.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('carrental::carclasses.title.carclasses')]));
    }
}
