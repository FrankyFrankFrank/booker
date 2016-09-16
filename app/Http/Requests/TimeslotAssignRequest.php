<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Timeslot;

class TimeslotAssignRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $timeslotId = $this->route('id');

        return Timeslot::where('id', $timeslotId)->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|alpha_dash',
            'readterms' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'readterms.required' => 'You must read and agree to the terms before booking.',
            'phone.required' => 'You must enter a valid phone number.',
            'phone.alpha_dash' => 'You may only use numbers and dashes in your phone number.'
        ];
    }

}
