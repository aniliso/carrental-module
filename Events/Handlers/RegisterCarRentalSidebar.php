<?php

namespace Modules\CarRental\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterCarRentalSidebar extends AbstractAdminSidebar
{
    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('carrental::carrental.title.carrental'), function (Item $item) {
                $item->icon('fa fa-car');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('carrental::cars.title.car'), function (Item $item) {
                    $item->item(trans('carrental::cars.title.prices'), function (Item $item) {
                        $item->icon('fa fa-money');
                        $item->weight(0);
                        $item->route('admin.carrental.car.prices');
                        $item->authorize(
                            $this->auth->hasAccess('carrental.cars.prices')
                        );
                    });
                    $item->item(trans('carrental::cars.title.list'), function (Item $item) {
                        $item->icon('fa fa-copy');
                        $item->weight(1);
                        $item->append('admin.carrental.car.create');
                        $item->route('admin.carrental.car.index');
                        $item->authorize(
                            $this->auth->hasAccess('carrental.cars.index')
                        );
                    });
                    $item->item(trans('carrental::carbrands.title.carbrands'), function (Item $item) {
                        $item->icon('fa fa-copy');
                        $item->weight(2);
                        $item->append('admin.carrental.carbrand.create');
                        $item->route('admin.carrental.carbrand.index');
                        $item->authorize(
                            $this->auth->hasAccess('carrental.carbrands.index')
                        );
                    });
                    $item->item(trans('carrental::carmodels.title.carmodels'), function (Item $item) {
                        $item->icon('fa fa-copy');
                        $item->weight(3);
                        $item->append('admin.carrental.carmodel.create');
                        $item->route('admin.carrental.carmodel.index');
                        $item->authorize(
                            $this->auth->hasAccess('carrental.carmodels.index')
                        );
                    });
                    $item->item(trans('carrental::carseries.title.carseries'), function (Item $item) {
                        $item->icon('fa fa-copy');
                        $item->weight(4);
                        $item->append('admin.carrental.carseries.create');
                        $item->route('admin.carrental.carseries.index');
                        $item->authorize(
                            $this->auth->hasAccess('carrental.carseries.index')
                        );
                    });
                    $item->item(trans('carrental::carclasses.title.carclasses'), function (Item $item) {
                        $item->icon('fa fa-copy');
                        $item->weight(5);
                        $item->append('admin.carrental.carclass.create');
                        $item->route('admin.carrental.carclass.index');
                        $item->authorize(
                            $this->auth->hasAccess('carrental.carclasses.index')
                        );
                    });
                });
                $item->item(trans('carrental::locations.title.locations'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.carrental.location.create');
                    $item->route('admin.carrental.location.index');
                    $item->authorize(
                        $this->auth->hasAccess('carrental.locations.index')
                    );
                });
                $item->item(trans('carrental::reservations.title.reservations'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.carrental.reservation.create');
                    $item->route('admin.carrental.reservation.index');
                    $item->authorize(
                        $this->auth->hasAccess('carrental.reservations.index')
                    );
                });
// append



            });
        });

        return $menu;
    }
}
