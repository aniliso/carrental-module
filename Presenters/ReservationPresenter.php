<?php  namespace Modules\Carrental\Presenters;

use Laracasts\Presenter\Presenter;
use Modules\Carrental\Repositories\LocationRepository;

class ReservationPresenter extends Presenter
{
    public function daily_price()
    {
        return number_format($this->entity->daily_price, 2);
    }

    public function total_price()
    {
        return number_format($this->entity->total_price, 2);
    }

    public function start_location()
    {
        return app(LocationRepository::class)->find($this->entity->start_location)->name ?? null;
    }

    public function return_location()
    {
        return app(LocationRepository::class)->find($this->entity->return_location)->name ?? null;
    }
}