<?php

namespace Modules\Carrental\Http\Requests\Car;

use Modules\Core\Internationalisation\BaseFormRequest;

class CarCreateRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'plate_no'   => 'required|max:10',
//            'model_year' => 'required|integer|min:1990|max:'.\Carbon::now()->year,
//            'current_km' => 'required|integer|digits_between:1,6',
//            'max_km' => 'required|integer|digits_between:1,6',
//            'period_km' => 'required|integer|digits_between:1,6',
            'class_id' => 'required|integer',
            'brand_id' => 'required|integer|required_with:model_id,series_id',
            'model_id' => 'required|integer|required_with:brand_id,series_id',
            'series_id' => 'required|integer|required_with:brand_id,model_id',
//            'license_key' => 'required_with:license_no,licensed_at',
//            'license_no' => 'required_with:license_key,licensed_at',
//            'chassis_no' => 'required|required_with:motor_no',
//            'motor_no' => 'required|required_with:chassis_no',
//            'current_fuel' => 'required|min:1|max:12',
//            'description' => 'max:255'
        ];
    }

    public function attributes()
    {
        return trans('carrental::cars.form');
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
