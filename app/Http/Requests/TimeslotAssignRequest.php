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
            'readterms' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'readterms.required' => 'You must read and agree to the terms before booking.',
        ];
    }

}
