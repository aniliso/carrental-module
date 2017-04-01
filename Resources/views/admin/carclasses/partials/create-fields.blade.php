<div class="box-body">
    {!! Form::i18nInput("name", trans('carrental::carclasses.form.name'), $errors, $lang, null, ['data-slug'=>'source']) !!}

    {!! Form::i18nInput("slug", trans('carrental::carclasses.form.slug'), $errors, $lang, null, ['data-slug'=>'target']) !!}
</div>
