<?php

namespace Modules\Carrental\Http\Controllers;

use Breadcrumbs;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Carrental\Http\Requests\Reservation\CreateReservationRequest;
use Modules\Carrental\Jobs\ProcessGuestMail;
use Modules\Carrental\Jobs\ProcessReservationMail;
use Modules\Carrental\Repositories\CarBrandRepository;
use Modules\Carrental\Repositories\CarClassRepository;
use Modules\Carrental\Repositories\CarRepository;
use Modules\Carrental\Repositories\ReservationRepository;
use Modules\Carrental\Services\ReservationSession;
use Modules\Core\Http\Controllers\BasePublicController;
use DB;

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
     * @var ReservationSession
     */
    private $session;
    /**
     * @var CarClassRepository
     */
    private $class;
    /**
     * @var CarBrandRepository
     */
    private $brand;

    /**
     * PublicController constructor.
     */
    public function __construct(
        CarRepository $car,
        Application $app,
        ReservationRepository $reservation,
        ReservationSession $session,
        CarClassRepository $class,
        CarBrandRepository $brand
    )
    {
        parent::__construct();
        $this->car = $car;
        $this->reservation = $reservation;
        $this->app = $app;
        $this->session = $session;
        $this->class = $class;
        $this->brand = $brand;

        /* Start Default Breadcrumbs */
        Breadcrumbs::register('carrental.index', function($breadcrumbs) {
            $breadcrumbs->push(trans('themes::carrental.titles.rental cars'), route('carrental.index'));
        });
        /* End Default Breadcrumbs */

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->has('pick_at')) {
            $this->session->update($request);
        }

        $sort['sort']     = $request->get('sort');
        $sort['dir']      = $request->get('dir');
        $sort['category'] = $request->get('category');
        $sort['brand']    = $request->get('brand');

        $class = $this->class->find($sort['category']);
        $brand = $this->brand->find($sort['brand']);

        $title = trans('themes::carrental.titles.rental cars');
        if($sort['category'] ||$sort['brand'])
            $title = trans('themes::carrental.titles.sort', ['class'=>$class->name ?? 'Sınıf', 'brand'=>$brand->name ?? 'Marka']);


        $cars = $this->car->allPaginate(config('asgard.carrental.config.per_page'), 1, $sort);

        $reservation = $this->session->getSession();

        $this->setTitle($title)
            ->setDescription(trans('themes::carrental.descriptions.index'));

        $this->setUrl(route('carrental.index'))
            ->addMeta('robots', "index, follow");

        /* Start Default Breadcrumbs */
        Breadcrumbs::register('carrental.sort', function($breadcrumbs) use ($title) {
            $breadcrumbs->push($title, route('carrental.index'));
        });
        /* End Default Breadcrumbs */

        return view('carrental::index', compact('cars', 'reservation', 'title'));
    }

    public function car($slug, $id)
    {
        $car = $this->car->find($id);
        if(!isset($car)) abort(404);

        $reservation = $this->session->getSession();

        $this->setTitle(trans('themes::carrental.titles.car', ['car'=>$car->fullname]))
             ->setDescription(trans('themes::carrental.descriptions.car', ['car'=>$car->fullname]));

        $this->setUrl($car->url)
             ->addMeta('robots', 'index, follow');

        Breadcrumbs::register('carrental.car', function ($breadcrumbs) use ($car) {
           $breadcrumbs->parent('carrental.index');
           $breadcrumbs->push(trans('themes::carrental.titles.car', ['car'=>$car->fullname]), $car->url);
        });

        return view('carrental::car', compact('car', 'reservation'));
    }

    public function prices()
    {
        $cars = $this->car->all();

        $this->setTitle(trans('themes::carrental.titles.prices'))
            ->setDescription(trans('themes::carrental.descriptions.prices'));

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
        $reservation = $this->session->getSession();

        if(!$request->session()->has('reservation') && !isset($reservation->car_id))
            return redirect()->route('homepage');

        $car = $this->car->find($reservation->car_id);

        if($reservation->total_day <= 0)
            return redirect()->back()->withErrors('En az 1 gün kiralama yapmalısınız!');

        $this->setTitle(trans('themes::carrental.titles.reservation car', ['car'=>$car->fullname]))
            ->setDescription(trans('themes::carrental.descriptions.car', ['car'=>$car->fullname]));

        $this->setUrl(route('carrental.prices'))
            ->addMeta('robots', "index, follow");

        /* Start Default Breadcrumbs */
        Breadcrumbs::register('carrental.reservation', function($breadcrumbs) use($car) {
            $breadcrumbs->parent('carrental.index');
            $breadcrumbs->push($car->fullname, $car->url);
            $breadcrumbs->push(trans('themes::carrental.titles.reservation car', ['car'=>$car->fullname]));
        });
        /* End Default Breadcrumbs */

        return view('carrental::reservation', compact('car', 'reservation'));
    }

    public function updateReservation(Request $request)
    {
        $this->session->update($request);
        return redirect()->route('carrental.reservation');
    }

    public function createReservation(CreateReservationRequest $request)
    {
        try {
            DB::beginTransaction();
            $reservation = $this->session->create($request);
            if($reservation = $this->reservation->create($reservation->toArray())) {
                DB::commit();
                ProcessReservationMail::dispatch($reservation);
                ProcessGuestMail::dispatch($reservation);
            }
            return redirect()->route('carrental.reservation')
                ->withSuccess(trans('carrental::reservations.messages.reservation created'));
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            return redirect()->route('carrental.reservation')
                ->withErrors($exception->getMessage());
        }
    }
}
