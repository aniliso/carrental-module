@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('carrental::reservations.title.edit reservation') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.carrental.reservation.index') }}">{{ trans('carrental::reservations.title.reservations') }}</a></li>
        <li class="active">{{ trans('carrental::reservations.title.edit reservation') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.carrental.reservation.update', $reservation->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <h3>{{ $reservation->id }} No.lu Rezervasyon</h3>
                    <hr />
                    <table class="table table-striped reservation">
                        <tr>
                            <th>TC Kimlik No</th>
                            <td>{{ $reservation->tc_no }}</td>
                        </tr>
                        <tr>
                            <th>Adı Soyadı</th>
                            <td>{{ $reservation->fullname }}</td>
                        </tr>
                        <tr>
                            <th>Telefon</th>
                            <td>{{ $reservation->phone }}</td>
                        </tr>
                        <tr>
                            <th>Mobil Telefon</th>
                            <td>{{ $reservation->mobile_phone }}</td>
                        </tr>
                        <tr>
                            <th>E-Posta</th>
                            <td>{{ $reservation->email }}</td>
                        </tr>
                        <tr>
                            <th>İstekler</th>
                            <td>{{ $reservation->requests }}</td>
                        </tr>
                        <tr>
                            <th>Araç</th>
                            <td>{{ isset($reservation->car->fullname) ? $reservation->car->fullname : '' }}</td>
                        </tr>
                        <tr>
                            <th>Başlangıç Tarihi / Alış Lokasyonu</th>
                            <td>{{ $reservation->pick_at->format('d/m/Y H:i') }} - {{ $reservation->present()->start_location }}</td>
                        </tr>
                        <tr>
                            <th>Dönüş Tarihi / Dönüş Lokasyonu</th>
                            <td>{{ $reservation->drop_at->format('d/m/Y H:i') }} - {{ $reservation->present()->return_location }}</td>
                        </tr>
                        <tr>
                            <th>Toplam Gün / Fiyat</th>
                            <td>{{ $reservation->total_day }} Gün - {{ $reservation->present()->total_price }} TL</td>
                        </tr>
                        <tr>
                            <th>Günlük Fiyatı</th>
                            <td>{{ $reservation->present()->daily_price }} TL / 1 Gün</td>
                        </tr>
                    </table>
                    <div class="box-footer">
                        <!--<button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>-->
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.carrental.reservation.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.carrental.reservation.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
@stop
