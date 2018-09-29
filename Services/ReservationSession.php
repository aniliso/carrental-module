<?php namespace Modules\Carrental\Services;

use Illuminate\Http\Request;
use Modules\Carrental\Entities\Car;
use Modules\Carrental\Entities\Reservation;
use Carbon\Carbon;

class ReservationSession
{
    private $reservation;
    private $car;

    public function __construct()
    {
        $this->car = app(Car::class);
    }

    public function update(Request $request)
    {
        return $this->reservationCreate($request);
    }

    public function create(Request $request)
    {
        return $this->reservationCreate($request);
    }

    public function destroy()
    {
        session()->forget('reservation');
        return $this;
    }

    public function sessionUpdate(Reservation $reservation)
    {
        session()->put('reservation', $reservation);
        return $this;
    }

    public function getSession()
    {
        return session()->get('reservation');
    }

    public function hasSession()
    {
        return session()->has('reservation');
    }

    private function reservationCreate(Request $request)
    {
        $this->reservation = $this->hasSession() ? $this->getSession() : new Reservation();

        if(!$this->reservation->pick_at && !$this->reservation->drop_at) {
            $this->reservation->pick_at = Carbon::now()->hour(9)->minute(0);
            $this->reservation->drop_at = Carbon::now()->addDay(1)->hour(9)->minute(0);
        }

        //Reservation Date
        $this->reservation->car_id          = $request->has('car_id') ? $request->car_id : $this->reservation->car_id;
        $this->reservation->pick_at         = $request->has('pick_at') ? Carbon::parse($request['pick_at'].' '.$request['pick_hour']) : Carbon::parse($this->reservation->pick_at);
        $this->reservation->drop_at         = $request->has('drop_at') ? Carbon::parse($request['drop_at'].' '.$request['drop_hour']) : Carbon::parse($this->reservation->drop_at);
        $this->reservation->start_location  = $request->has('start_location') ? $request->start_location : $this->reservation->start_location;
        $this->reservation->return_location = $request->has('return_location') ? $request->return_location : $this->reservation->return_location;

        //Reservation Details
        $this->reservation->total_day       = ceil($this->reservation->drop_at->diffInHours($this->reservation->pick_at)/24);

        if($car = $this->car->find($request->car_id)) {
            $this->reservation->daily_price = $this->car->findPriceForDay($car, $this->reservation->total_day);
            $this->reservation->total_price = $this->reservation->daily_price * $this->reservation->total_day;
        }

        //Reservation Info
        $this->reservation->tc_no           = $request->tc_no;
        $this->reservation->first_name      = $request->first_name;
        $this->reservation->last_name       = $request->last_name;
        $this->reservation->phone           = $request->phone;
        $this->reservation->mobile_phone    = $request->mobile_phone;
        $this->reservation->email           = $request->email;
        $this->reservation->requests        = $request->requests;

        $this->sessionUpdate($this->reservation);

        return $this->getSession();
    }

}