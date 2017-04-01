<?php namespace Modules\CarRental\Entities\Car;


class Color
{
    const BEIGE = 1;
    const WHITE = 2;
    const CLARET_RED = 3;
    const SMOKED = 4;
    const GREY = 5;
    const SILVER_GREY = 6;
    const BROWN = 7;
    const RED = 8;
    const NAVY_BLUE = 9;
    const BLUE = 10;
    const PINK = 11;
    const YELLOW = 12;
    const BLACK = 13;
    const CHAMPAGNE = 14;
    const TURQUOISE = 15;
    const ORANGE = 16;
    const GREEN = 17;

    private $colors = [];

    public function __construct()
    {
        $this->colors = [
            self::BEIGE       => trans('carrental::cars.form.colors.beige'),
            self::WHITE       => trans('carrental::cars.form.colors.white'),
            self::CLARET_RED  => trans('carrental::cars.form.colors.claret_red'),
            self::SMOKED      => trans('carrental::cars.form.colors.smoked'),
            self::GREY        => trans('carrental::cars.form.colors.grey'),
            self::SILVER_GREY => trans('carrental::cars.form.colors.silver_grey'),
            self::BROWN       => trans('carrental::cars.form.colors.brown'),
            self::RED         => trans('carrental::cars.form.colors.red'),
            self::NAVY_BLUE   => trans('carrental::cars.form.colors.navy_blue'),
            self::BLUE        => trans('carrental::cars.form.colors.blue'),
            self::PINK        => trans('carrental::cars.form.colors.pink'),
            self::YELLOW      => trans('carrental::cars.form.colors.yellow'),
            self::BLACK       => trans('carrental::cars.form.colors.black'),
            self::CHAMPAGNE   => trans('carrental::cars.form.colors.champagne'),
            self::TURQUOISE   => trans('carrental::cars.form.colors.turquoise'),
            self::ORANGE      => trans('carrental::cars.form.colors.orange'),
            self::GREEN       => trans('carrental::cars.form.colors.green')
        ];
    }

    public function lists()
    {
        return $this->colors;
    }

    public function get($colorId)
    {
        if(isset($colorId)) {
            return $this->colors[$colorId];
        }
        return $this->colors[self::WHITE];
    }
}