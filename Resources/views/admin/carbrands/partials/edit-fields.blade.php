<div class="box-body">
    {!! Form::normalInput("name", trans('carrental::carbrands.form.name'), $errors, $carbrand, ['data-slug'=>'source']) !!}

    {!! Form::normalInput("slug", trans('carrental::carbrands.form.slug'), $errors, $carbrand, ['data-slug'=>'target']) !!}

    @mediaSingle('carbrandImage', null, null, trans('store::categories.form.image'))
</div>
