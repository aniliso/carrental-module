<div class="box-body">
    <div class="col-md-6 col-sm-12 col-xs-12">
        {!! BSControlGroup::generate(
            BSForm::label('plate_no', trans('carrental::cars.form.plate_no')),
            BSForm::text('plate_no', old('plate_no')),
            BSForm::help($errors->first('plate_no')),
            4
        )->withAttributes(['class'=>$errors->has("plate_no") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('model_year', trans('carrental::cars.form.model_year')),
            BSForm::text('model_year', old('model_year')),
            BSForm::help($errors->first('model_year')),
            4
        )->withAttributes(['class'=>$errors->has("model_year") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('chassis_no', trans('carrental::cars.form.chassis_no')),
            BSForm::text('chassis_no', old('chassis_no')),
            BSForm::help($errors->first('chassis_no')),
            4
        )->withAttributes(['class'=>$errors->has("chassis_no") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('motor_no', trans('carrental::cars.form.motor_no')),
            BSForm::text('motor_no', old('motor_no')),
            BSForm::help($errors->first('motor_no')),
            4
        )->withAttributes(['class'=>$errors->has("motor_no") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('current_km', trans('carrental::cars.form.current_km')),
            BSInputGroup::withContents(BSForm::text('current_km', old('current_km'), ['class'=>'text-right']))->append('km'),
            BSForm::help($errors->first('current_km')),
            4
        )->withAttributes(['class'=>$errors->has("current_km") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('max_km', trans('carrental::cars.form.max_km')),
            BSInputGroup::withContents(BSForm::text('max_km', old('max_km'), ['class'=>'text-right']))->append('km'),
            BSForm::help($errors->first('max_km')),
            4
        )->withAttributes(['class'=>$errors->has("max_km") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('period_km', trans('carrental::cars.form.period_km')),
            BSInputGroup::withContents(BSForm::text('period_km', old('period_km'), ['class'=>'text-right']))->append('km'),
            BSForm::help($errors->first('period_km')),
            4
        )->withAttributes(['class'=>$errors->has("period_km") ? ' has-error' : '']) !!}

        <div class="form-group">
            {!! BSForm::label('identity_no', trans('carrental::cars.form.identity_no').'/'.trans('carrental::cars.form.tax_no'), ['class'=>'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6">
                        {!! BSForm::text('identity_no', old('identity_no')) !!}
                        {!! BSForm::help($errors->first('identity_no')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! BSForm::text('tax_no', old('tax_no')) !!}
                        {!! BSForm::help($errors->first('tax_no')) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! BSForm::label('license_key', trans('carrental::cars.form.license_key').'/'.trans('carrental::cars.form.license_no'), ['class'=>'col-sm-4']) !!}
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-3">
                        {!! BSForm::text('license_key', old('license_key')) !!}
                    </div>
                    <div class="col-sm-9">
                        {!! BSForm::text('license_no', old('license_no')) !!}

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        {!! BSForm::help($errors->first('license_no')) !!}
                        {!! BSForm::help($errors->first('license_key')) !!}
                    </div>
                </div>
            </div>
        </div>


        {!! BSControlGroup::generate(
            BSForm::label('licensed_at', trans('carrental::cars.form.licensed_at')),
            BSInputGroup::withContents(BSForm::text('licensed_at', old('licensed_at'), ['class'=>'date', 'id'=>'licensed_at']))->append('<span class="glyphicon glyphicon-calendar"></span>'),
            BSForm::help($errors->first('licensed_at')),
            4
        )->withAttributes(['class'=>$errors->has("licensed_at") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('current_fuel', trans('carrental::cars.form.current_fuel')),
            BSInputGroup::withContents(BSForm::text('current_fuel', old('current_fuel'), ['class'=>'text-right']))->append('/12'),
            BSForm::help($errors->first('current_fuel')),
            4
        )->withAttributes(['class'=>$errors->has("current_fuel") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('description', trans('carrental::cars.form.description')),
            BSForm::textarea('description', old('description'), ['rows'=>3]),
            BSForm::help($errors->first('description')),
            4
        )->withAttributes(['class'=>$errors->has("description") ? ' has-error' : '']) !!}
    </div>
    <div class="col-md-6 col-sm-12 col-xs-12">
        {!! BSControlGroup::generate(
            BSForm::label('status', trans('carrental::cars.form.status')),
            BSForm::checkbox('status', "1", old('status'), ['class'=>'flat-blue']),
            BSForm::help($errors->first('status')),
            4
        ) !!}

        {!! BSControlGroup::generate(
            BSForm::label('available_status', trans('carrental::cars.form.available_status')),
            BSForm::select('available_status', $availableStatuses, null, ['class'=>'semantic ui fluid search dropdown']),
            BSForm::help($errors->first('available_status')),
            4
        )->withAttributes(['class'=>$errors->has("available_status") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('class_id', trans('carrental::carclasses.title.carclasses')),
            BSForm::select('class_id', $classLists, null, ['class'=>'semantic ui fluid search dropdown']),
            BSForm::help($errors->first('class_id')),
            4
        )->withAttributes(['class'=>$errors->has("brand_id") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('brand_id', trans('carrental::carbrands.title.carbrands')),
            BSForm::select('brand_id', $brandLists, null, ['class'=>'brand ui fluid search dropdown']),
            BSForm::help($errors->first('brand_id')),
            4
        )->withAttributes(['class'=>$errors->has("brand_id") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('model_id', trans('carrental::carmodels.title.carmodels')),
            BSForm::select('model_id', [], null, ['class'=>'model ui fluid search dropdown']),
            BSForm::help($errors->first('model_id')),
            4
        )->withAttributes(['class'=>$errors->has("model_id") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('series_id', trans('carrental::carseries.title.carseries')),
            BSForm::select('series_id', [], null, ['class'=>'series ui fluid search dropdown']),
            BSForm::help($errors->first('series_id')),
            4
        )->withAttributes(['class'=>$errors->has("series_id") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('fuel_type', trans('carrental::cars.form.fuel_type')),
            BSForm::select('fuel_type', $fuels, null, ['class'=>'semantic ui fluid search dropdown']),
            BSForm::help($errors->first('fuel_type')),
            4
        )->withAttributes(['class'=>$errors->has("fuel_type") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('transmission', trans('carrental::cars.form.transmission')),
            BSForm::select('transmission', $transmissions, null, ['class'=>'semantic ui fluid search dropdown']),
            BSForm::help($errors->first('transmission')),
            4
        )->withAttributes(['class'=>$errors->has("transmission") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('body_type', trans('carrental::cars.form.body_type')),
            BSForm::select('body_type', $body_types, null, ['class'=>'semantic ui fluid search dropdown']),
            BSForm::help($errors->first('body_type')),
            4
        )->withAttributes(['class'=>$errors->has("body_type") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('color', trans('carrental::cars.form.color')),
            BSForm::select('color', $colors, null, ['class'=>'semantic ui fluid search dropdown']),
            BSForm::help($errors->first('color')),
            4
        )->withAttributes(['class'=>$errors->has("color") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('engine_capacity', trans('carrental::cars.form.engine_capacity')),
            BSForm::select('engine_capacity', $engineCapacities, null, ['class'=>'semantic ui fluid search dropdown']),
            BSForm::help($errors->first('engine_capacity')),
            4
        )->withAttributes(['class'=>$errors->has("engine_capacity") ? ' has-error' : '']) !!}

        {!! BSControlGroup::generate(
            BSForm::label('horsepower', trans('carrental::cars.form.horsepower')),
            BSForm::select('horsepower', $horsePowers, null, ['class'=>'semantic ui fluid search dropdown']),
            BSForm::help($errors->first('horsepower')),
            4
        )->withAttributes(['class'=>$errors->has("horsepower") ? ' has-error' : '']) !!}
    </div>
</div>