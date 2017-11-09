<?php

namespace Modules\Carrental\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Carrental\Entities\Location;
use Modules\Carrental\Repositories\LocationRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class LocationController extends AdminBaseController
{
    /**
     * @var LocationRepository
     */
    private $location;

    public function __construct(LocationRepository $location)
    {
        parent::__construct();

        $this->location = $location;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $locations = $this->location->all();

        return view('carrental::admin.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('carrental::admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->location->create($request->all());

        return redirect()->route('admin.carrental.location.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('carrental::locations.title.locations')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Location $location
     * @return Response
     */
    public function edit(Location $location)
    {
        return view('carrental::admin.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Location $location
     * @param  Request $request
     * @return Response
     */
    public function update(Location $location, Request $request)
    {
        $this->location->update($location, $request->all());

        return redirect()->route('admin.carrental.location.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('carrental::locations.title.locations')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Location $location
     * @return Response
     */
    public function destroy(Location $location)
    {
        $this->location->destroy($location);

        return redirect()->route('admin.carrental.location.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('carrental::locations.title.locations')]));
    }
}
