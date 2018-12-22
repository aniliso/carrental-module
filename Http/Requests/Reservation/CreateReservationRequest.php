<?php

namespace Modules\Carrental\Http\Requests\Reservation;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateReservationRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tc_no'                => 'required',
            'first_name'           => 'required',
            'last_name'            => 'required',
            'mobile_phone'         => 'required',
            'email'                => 'required|email',
            //'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function attributes()
    {
        return trans('carrental::reservations.form');
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
