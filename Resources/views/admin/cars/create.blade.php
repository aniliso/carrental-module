@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('carrental::cars.title.create car') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.carrental.car.index') }}">{{ trans('carrental::cars.title.cars') }}</a></li>
        <li class="active">{{ trans('carrental::cars.title.create car') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.carrental.car.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#car" data-toggle="tab">{{ trans('carrental::cars.title.car') }}</a></li>
                    <li><a href="#images" data-toggle="tab">{{ trans('carrental::cars.title.images') }}</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="car">
                        @include('carrental::admin.cars.partials.create-car-fields')
                    </div>
                    <div class="tab-pane" id="images">
                        <div class="form-group">
                        @mediaMultiple('carImages', null, null, trans('carrental::cars.title.images'))
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
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
                onChange: function(value, text) {
                    $('.model.ui.dropdown').dropdown('clear').dropdown({
                        saveRemoteData: false,
                        apiSettings: {
                            action: 'get models',
                            urlData: {_token: '{{ csrf_token() }}', id : value},
                            cache: false
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
