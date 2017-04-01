<div class="box-body">
    {!! Form::normalSelect('brand_id', trans('carrental::carbrands.title.carbrands'), $errors, $brandLists, $carmodel, ['class'=>'brand ui search dropdown']) !!}

    {!! Form::normalInput("name", trans('carrental::carbrands.form.name'), $errors, $carmodel, ['data-slug'=>'source']) !!}
</div>
