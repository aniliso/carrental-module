<div class="box-body">
    {!! Form::normalInput("name", trans('carrental::carbrands.form.name'), $errors, null, ['data-slug'=>'source']) !!}

    {!! Form::normalInput("slug", trans('carrental::carbrands.form.slug'), $errors, null, ['data-slug'=>'target']) !!}

    @mediaSingle('carbrandImage', null, null, trans('store::categories.form.image'))
</div>
