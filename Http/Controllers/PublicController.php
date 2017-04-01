<?php

namespace Modules\CarRental\Http\Controllers;

use Breadcrumbs;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\CarRental\Entities\Car;
use Modules\CarRental\Entities\Reservation;
use Modules\CarRental\Http\Requests\Reservation\CreateReservationRequest;
use Modules\CarRental\Mail\ReservationCreated;
use Modules\CarRental\Repositories\CarRepository;
use Modules\CarRental\Repositories\ReservationRepository;
use Modules\Core\Http\Controllers\BasePublicController;

class PublicController extends BasePublicController
{
    /**
     * @var CarRepository
     */
    private $car;
    /**
     * @var Application
     */
    private $app;
    /**
     * @var ReservationRepository
     */
    private $reservation;

    /**
     * PublicController constructor.
     */
    public function __construct(CarRepository $car, Application $app, ReservationRepository $reservation)
    {
        parent::__construct();
        $this->car = $car;
        $this->reservation = $reservation;
        $this->app = $app;

        /* Start Default Breadcrumbs */
        Breadcrumbs::register('carrental.index', function($breadcrumbs) {
            $breadcrumbs->push("Kiralık Araçlar", route('carrental.index'));
        });
        /* End Default Breadcrumbs */

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $cars = $this->car->allPaginate(5);

        $reservation = $request->session()->get('reservation');

        $this->setTitle("Kiralık Araçlar")
            ->setDescription("Ankara içi ve dışı araç kiralama hizmeti vermekteyiz.");

        $this->setUrl(route('carrental.index'))
            ->addMeta('robots', "index, follow");

        return view('carrental::index', compact('cars', 'reservation'));
    }

    public function prices()
    {
        $cars = $this->car->all();

        $this->setTitle("Kiralık Araç Fiyatları")
            ->setDescription("Lüks, Standart, ekonomik araçlar için kiralık araç fiyat listesi");

        $this->setUrl(route('carrental.prices'))
            ->addMeta('robots', "index, follow");

        /* Start Default Breadcrumbs */
        Breadcrumbs::register('carrental.prices', function($breadcrumbs) {
            $breadcrumbs->parent('carrental.index');
            $breadcrumbs->push(trans('carrental::cars.title.prices'), route('carrental.prices'));
        });
        /* End Default Breadcrumbs */

        return view('carrental::prices', compact('cars'));
    }

    public function reservation(Request $request)
    {
        $car = $this->car->find($request->car_id);

        if(!isset($car)) return redirect()->route('carrental.index');

        $reservation = $request->session()->get('reservation');

        $this->setTitle("Kiralık ".$car->fullname)
            ->setDescription("Kiralık ".$car->fullname);

        $this->setUrl(route('carrental.prices'))
            ->addMeta('robots', "index, follow");

        /* Start Default Breadcrumbs */
        Breadcrumbs::register('carrental.reservation', function($breadcrumbs) {
            $breadcrumbs->parent('carrental.index');
            $breadcrumbs->push(trans('carrental::reservations.title.reservations'), route('carrental.reservation'));
        });
        /* End Default Breadcrumbs */

        return view('carrental::reservation', compact('car', 'reservation'));
    }

    public function updateReservation(Request $request)
    {
        $this->reservationUpdate($request);
        return redirect()->route('carrental.reservation', ['car_id'=>$request->car_id]);
    }

    public function createReservation(CreateReservationRequest $request)
    {
        $reservation = $this->reservationUpdate($request);
        if($reservation = $this->reservation->create($reservation->toArray()))
        {
            \Mail::to(setting('theme::email'))->send(new ReservationCreated($reservation));
        }
        return redirect()->route('carrental.reservation', ['car_id'=>$request->car_id])
                         ->withSuccess(trans('carrental::reservations.messages.reservation created'));
    }

    private function reservationUpdate(Request $request)
    {
        if($request->session()->has('reservation'))
        {
            $reservation = $request->session()->get('reservation');
            $reservation->car_id = $request->has('car_id') ? $request->car_id : $reservation->car_id;
            $reservation->pick_at = $request->has('pick_at') ? \Carbon::parse($request['pick_at'].$request['pick_hour']) : $reservation->pick_at;
            $reservation->drop_at = $request->has('drop_at') ? \Carbon::parse($request['drop_at'].$request['drop_hour']) : $reservation->drop_at;
            $reservation->start_location = $request->has('start_location') ? $request->start_location : $reservation->start_location;
            $reservation->return_location = $request->has('return_location') ? $request->return_location : $reservation->return_location;
            $reservation->total_day = ceil($reservation->drop_at->diffInHours($reservation->pick_at)/24);
            if($car = $this->car->find($request->car_id)) {
                $reservation->daily_price = app(Car::class)->findPriceForDay($car, $reservation->total_day);
            }
            $reservation->tc_no = $request->tc_no;
            $reservation->first_name = $request->first_name;
            $reservation->last_name = $request->last_name;
            $reservation->phone = $request->phone;
            $reservation->mobile_phone = $request->mobile_phone;
            $reservation->email = $request->email;
            $reservation->requests = $request->requests;
            $request->session()->put('reservation', $reservation);
        } else {
            $request['pick_at'] = \Carbon::parse($request['pick_at'].$request['pick_hour']);
            $request['drop_at'] = \Carbon::parse($request['drop_at'].$request['drop_hour']);
            $input = $request->except(['pick_hour', 'drop_hour', '_method', '_token']);
            $reservation = new Reservation($input);
            $request->session()->put('reservation', $reservation);
        }
        return $request->session()->get('reservation');
    }
}
