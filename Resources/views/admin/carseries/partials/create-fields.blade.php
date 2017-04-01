<div class="box-body">
    {!! Form::normalSelect('model_id', trans('carrental::carmodels.title.carmodels'), $errors, $modelLists, null, ['class'=>'brand ui search dropdown']) !!}

    {!! Form::normalInput("name", trans('carrental::carbrands.form.name'), $errors, null, ['data-slug'=>'source']) !!}

    {!! Form::normalInput("person", trans('carrental::carseries.form.person'), $errors, null) !!}

    {!! Form::normalInput("baggage", trans('carrental::carseries.form.baggage'), $errors, null) !!}
</div>
