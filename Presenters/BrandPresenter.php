<?php namespace Modules\Carrental\Presenters;


use Modules\Core\Presenters\BasePresenter;

class BrandPresenter extends BasePresenter
{
    protected $zone     = 'carbrandImage';
    protected $slug     = 'slug';
    protected $transKey = 'carrental::routes.brand.slug';
    protected $routeKey = 'brand.slug';

    public function logo($width)
    {
        return \Html::image($this->firstImage($width,null,'resize',70), $this->entity->name,['style'=>'width:'.($width/2).'px']);
    }
}