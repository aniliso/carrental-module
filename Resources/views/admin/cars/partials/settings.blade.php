<div class="row box-body">
    <div class="form-group col-md-2">
        <label for="settings.show_home">
            {!! Form::hidden('settings[show_home]', 0) !!}
            {!! Form::checkbox("settings[show_home]", 1, old('settings.show_home', isset($car->settings->show_home) ? $car->settings->show_home : 0), ['class'=>'flat-blue']) !!}
            &nbsp; Anasayfa da göster
        </label>
    </div>
    <div class="form-group col-md-2">
        <label for="settings.show_home">
            {!! Form::hidden('settings[show_banner]', 0) !!}
            {!! Form::checkbox("settings[show_banner]", 1, old('settings.show_banner', isset($car->settings->show_banner) ? $car->settings->show_banner : 0), ['class'=>'flat-blue']) !!}
            &nbsp; Slider da göster
        </label>
    </div>
</div>