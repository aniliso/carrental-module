<div class="box-body form-horizontal">
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::label('plate_no', trans('carrental::cars.form.plate_no'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('plate_no', old('plate_no', $car->plate_no ?? null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.plate_no')]) !!}
                {!! $errors->first("plate_no", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('model_year', trans('carrental::cars.form.model_year'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('model_year', old('model_year', $car->model_year ?? null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.model_year')]) !!}
                {!! $errors->first("model_year", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('chassis_no', trans('carrental::cars.form.chassis_no'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('chassis_no', old('chassis_no', $car->chassis_no ?? null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.chassis_no')]) !!}
                {!! $errors->first("chassis_no", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('motor_no', trans('carrental::cars.form.motor_no'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::text('motor_no', old('motor_no', $car->motor_no ?? null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.motor_no')]) !!}
                {!! $errors->first("motor_no", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('current_km', trans('carrental::cars.form.current_km'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group">
                    {!! Form::text('current_km', old('current_km', $car->current_km ?? null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.current_km')]) !!}
                    <div class="input-group-addon">km</div>
                    {!! $errors->first("current_km", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('max_km', trans('carrental::cars.form.max_km'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group">
                    {!! Form::text('max_km', old('max_km', $car->max_km ?? null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.max_km')]) !!}
                    <div class="input-group-addon">km</div>
                    {!! $errors->first("max_km", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('period_km', trans('carrental::cars.form.period_km'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group">
                    {!! Form::text('period_km', old('period_km', $car->period_km ?? null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.period_km')]) !!}
                    <div class="input-group-addon">km</div>
                    {!! $errors->first("period_km", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('identity_no', trans('carrental::cars.form.identity_no'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-4">
                {!! Form::text('identity_no', old('identity_no', $car->identity_no ?? null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.identity_no')]) !!}
                {!! $errors->first("identity_no", '<span class="help-block">:message</span>') !!}
            </div>
            <div class="col-sm-4">
                {!! Form::text('tax_no', old('tax_no', $car->tax_no ?? null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.tax_no')]) !!}
                {!! $errors->first("tax_no", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('license_key', trans('carrental::cars.form.license_key'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-4">
                {!! Form::text('license_key', old('license_key', $car->license_key ?? null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.license_key')]) !!}
                {!! $errors->first("license_key", '<span class="help-block">:message</span>') !!}
            </div>
            <div class="col-sm-4">
                {!! Form::text('license_no', old('license_no', $car->license_no ?? null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.license_no')]) !!}
                {!! $errors->first("license_no", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('licensed_at', trans('carrental::cars.form.licensed_at'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group">
                    {!! Form::text('licensed_at', old('licensed_at', isset($car->licensed_at) ? $car->licensed_at->format('Y-m-d') : null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.licensed_at')]) !!}
                    <div class="input-group-addon"><i class="fa fa-calendar-o"></i></div>
                    {!! $errors->first("licensed_at", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('current_fuel', trans('carrental::cars.form.current_fuel'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="input-group">
                    {!! Form::text('current_fuel', old('current_fuel', $car->current_fuel ?? null), ['class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.current_fuel')]) !!}
                    <div class="input-group-addon">/12</div>
                    {!! $errors->first("current_fuel", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('description', trans('carrental::cars.form.description'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::textarea('description', old('description', $car->description ?? null), ['rows'=>3, 'class'=>'form-control', 'placeholder'=>trans('carrental::cars.form.description')]) !!}
                {!! $errors->first("description", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        <div class="form-group">
            {!! Form::hidden('status', 0) !!}
            {!! Form::label('status', trans('carrental::cars.form.status'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::checkbox('status', 1, old('status', $car->status), ['class'=>'flat-blue']) !!}
                {!! $errors->first("status", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('available_status', trans('carrental::cars.form.available_status'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('available_status', $availableStatuses, $car->available_status, ['class'=>'semantic ui fluid search dropdown']) !!}
                {!! $errors->first("available_status", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('class_id', trans('carrental::cars.form.class_id'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('class_id', $classLists, old('class_id', $car->class_id ?? null), ['class'=>'semantic ui fluid search dropdown']) !!}
                {!! $errors->first("class_id", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('brand_id', trans('carrental::cars.form.brand_id'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('brand_id', $brandLists, old('brand_id', $car->brand_id ?? null), ['class'=>'brand ui fluid search dropdown']) !!}
                {!! $errors->first("brand_id", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('model_id', trans('carrental::cars.form.model_id'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('model_id', $models, old('model_id', $car->model_id ?? null), ['class'=>'model ui fluid search dropdown']) !!}
                {!! $errors->first("model_id", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('series_id', trans('carrental::cars.form.series_id'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('series_id', $series, old('series_id', $car->series_id ?? null), ['class'=>'series ui fluid search dropdown']) !!}
                {!! $errors->first("series_id", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('fuel_type', trans('carrental::cars.form.fuel_type'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('fuel_type', $fuels, old('fuel_type', $car->fuel_type ?? null), ['class'=>'semantic ui fluid search dropdown']) !!}
                {!! $errors->first("fuel_type", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('transmission', trans('carrental::cars.form.transmission'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('transmission', $transmissions, old('transmission', $car->transmission ?? null), ['class'=>'semantic ui fluid search dropdown']) !!}
                {!! $errors->first("transmission", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('body_type', trans('carrental::cars.form.body_type'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('body_type', $body_types, old('body_type', $car->body_type ?? null), ['class'=>'semantic ui fluid search dropdown']) !!}
                {!! $errors->first("body_type", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('color', trans('carrental::cars.form.color'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('color', $colors, old('color', $car->color ?? null), ['class'=>'semantic ui fluid search dropdown']) !!}
                {!! $errors->first("color", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('engine_capacity', trans('carrental::cars.form.engine_capacity'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('engine_capacity', $engineCapacities, old('engine_capacity', $car->engine_capacity ?? null), ['class'=>'semantic ui fluid search dropdown']) !!}
                {!! $errors->first("engine_capacity", '<span class="help-block">:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('horsepower', trans('carrental::cars.form.horsepower'), ['class'=>'control-label col-sm-4']) !!}
            <div class="col-sm-8">
                {!! Form::select('horsepower', $horsePowers, old('horsepower', $car->horsepower ?? null), ['class'=>'semantic ui fluid search dropdown']) !!}
                {!! $errors->first("horsepower", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
    </div>
</div>