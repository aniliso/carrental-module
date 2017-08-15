<?php

namespace Modules\CarRental\Http\Requests\CarClass;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateCarClassRequest extends BaseFormRequest
{
    protected $translationsAttributesKey = 'carrental::carclasses.form';

    public function translationRules()
    {
        return [
            'name' => 'required|max:100',
            'slug' => 'required|max:100',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ordering' => 'required|integer|digits_between:1,5'
        ];
    }

    public function attributes()
    {
        return trans('carrental::carclasses.form');
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
