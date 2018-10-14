@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('carrental::cars.title.prices') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.carrental.car.index') }}"><i class="fa fa-car"></i> {{ trans('carrental::cars.title.cars') }}</a></li>
        <li class="active">{{ trans('carrental::cars.title.prices') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.carrental.car.updatePrices'], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="nav-tabs-custom">
                <div class="tab-content">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Araç</th>
                            <th>1-3 Gün</th>
                            <th>4-7 Gün</th>
                            <th>8-14 Gün</th>
                            <th>15-20 Gün</th>
                            <th>21-27 Gün</th>
                            <th>28+ Gün</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                        <tr>
                            <td style="width: 10px">{{ $car->id }}</td>
                            <td>{{ $car->present()->fullname }} ({{ $car->present()->transmission }})</td>
                            <td>{!! BSForm::text("{$car->id}[price1]", old("{$car->id}[price1]", $car->prices->price1)) !!}</td>
                            <td>{!! BSForm::text("{$car->id}[price2]", old("{$car->id}[price2]", $car->prices->price2)) !!}</td>
                            <td>{!! BSForm::text("{$car->id}[price3]", old("{$car->id}[price3]", $car->prices->price3)) !!}</td>
                            <td>{!! BSForm::text("{$car->id}[price4]", old("{$car->id}[price4]", $car->prices->price4)) !!}</td>
                            <td>{!! BSForm::text("{$car->id}[price5]", old("{$car->id}[price5]", $car->prices->price5)) !!}</td>
                            <td>{!! BSForm::text("{$car->id}[price6]", old("{$car->id}[price6]", $car->prices->price6)) !!}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.carrental.car.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection