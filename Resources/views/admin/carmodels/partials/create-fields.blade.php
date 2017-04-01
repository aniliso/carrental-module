<div class="box-body">
    {!! Form::normalSelect('brand_id', trans('carrental::carbrands.title.carbrands'), $errors, $brandLists, null, ['class'=>'brand ui search dropdown']) !!}

    {!! Form::normalInput("name", trans('carrental::carbrands.form.name'), $errors, null, ['data-slug'=>'source']) !!}
</div>
