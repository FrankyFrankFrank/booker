<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditProjectRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasRole('Admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'project' => 'integer|size:1',
          'name' => 'string|required',
          'logo' => 'file|image',
        ];
    }
}
