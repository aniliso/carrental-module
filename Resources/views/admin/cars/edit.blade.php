@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('carrental::cars.title.edit car') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.carrental.car.index') }}">{{ trans('carrental::cars.title.cars') }}</a></li>
        <li class="active">{{ trans('carrental::cars.title.edit car') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.carrental.car.update', $car->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#car" data-toggle="tab">{{ trans('carrental::cars.title.car') }}</a></li>
                    <li><a href="#images" data-toggle="tab">{{ trans('carrental::cars.title.images') }}</a></li>
                    <li><a href="#prices" data-toggle="tab">{{ trans('carrental::cars.title.prices') }}</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="car">
                        @include('carrental::admin.cars.partials.edit-car-fields')
                    </div>
                    <div class="tab-pane" id="images">
                        <div class="form-group">
                            @mediaMultiple('carImages', $car, null, trans('carrental::cars.title.images'))
                        </div>
                    </div>
                    <div class="tab-pane" id="prices">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>1-3 Gün</th>
                                <th>4-7 Gün</th>
                                <th>8-14 Gün</th>
                                <th>15-20 Gün</th>
                                <th>21-27 Gün</th>
                                <th>28+ Gün</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{!! BSForm::text("prices[price1]", old("prices[price1]", $car->prices->price1)) !!}</td>
                                    <td>{!! BSForm::text("prices[price2]", old("prices[price2]", $car->prices->price2)) !!}</td>
                                    <td>{!! BSForm::text("prices[price3]", old("prices[price3]", $car->prices->price3)) !!}</td>
                                    <td>{!! BSForm::text("prices[price4]", old("prices[price4]", $car->prices->price4)) !!}</td>
                                    <td>{!! BSForm::text("prices[price5]", old("prices[price5]", $car->prices->price5)) !!}</td>
                                    <td>{!! BSForm::text("prices[price6]", old("prices[price6]", $car->prices->price6)) !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.carrental.car.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
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
                    { key: 'b', route: "<?= route('admin.carrental.car.index') ?>" }
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
            $('.category.ui.dropdown').dropdown({
                allowAdditions: true
            });
            $.fn.api.settings.api = {
                'get models': '{{ route('api.carrental.model') }}?brand_id={id}',
                'get series': '{{ route('api.carrental.series') }}?model_id={id}'
            };
            var brand = $('.brand.ui.dropdown').dropdown({
                saveRemoteData: false,
                beforeSend: function(){
                    $('.model.ui.dropdown').dropdown('clear');
                },
                onChange: function(value, text) {
                    $('.model.ui.dropdown').dropdown('clear').dropdown({
                        saveRemoteData: false,
                        apiSettings: {
                            action: 'get models',
                            urlData: {_token: '{{ csrf_token() }}', id : value},
                            cache: false
                        },
                        beforeSend: function() {
                            $('.series.ui.dropdown').dropdown('clear');
                        },
                        onChange: function(value, text) {
                            $('.series.ui.dropdown').dropdown('clear').dropdown({
                                saveRemoteData: false,
                                apiSettings: {
                                    action: 'get series',
                                    urlData: {_token: '{{ csrf_token() }}', id : value},
                                    cache: false
                                }
                            });
                        }
                    });
                }
            });
            $('.semantic.ui.dropdown').dropdown({
                allowAdditions: true
            });
            $('#licensed_at').datetimepicker({
                locale: '<?= App::getLocale() ?>',
                allowInputToggle: true,
                format: 'YYYY-MM-DD'
            });
        });
    </script>
@stop
