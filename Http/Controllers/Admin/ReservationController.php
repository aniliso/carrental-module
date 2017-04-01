<?php

namespace Modules\CarRental\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\CarRental\Entities\Reservation;
use Modules\CarRental\Repositories\ReservationRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ReservationController extends AdminBaseController
{
    /**
     * @var ReservationRepository
     */
    private $reservation;

    public function __construct(ReservationRepository $reservation)
    {
        parent::__construct();

        $this->reservation = $reservation;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $reservations = $this->reservation->all();

        return view('carrental::admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('carrental::admin.reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->reservation->create($request->all());

        return redirect()->route('admin.carrental.reservation.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('carrental::reservations.title.reservations')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Reservation $reservation
     * @return Response
     */
    public function edit(Reservation $reservation)
    {
        return view('carrental::admin.reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Reservation $reservation
     * @param  Request $request
     * @return Response
     */
    public function update(Reservation $reservation, Request $request)
    {
        $this->reservation->update($reservation, $request->all());

        return redirect()->route('admin.carrental.reservation.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('carrental::reservations.title.reservations')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Reservation $reservation
     * @return Response
     */
    public function destroy(Reservation $reservation)
    {
        $this->reservation->destroy($reservation);

        return redirect()->route('admin.carrental.reservation.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('carrental::reservations.title.reservations')]));
    }
}
