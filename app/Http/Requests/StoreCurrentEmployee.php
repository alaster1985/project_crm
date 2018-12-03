<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurrentEmployee extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'position_id' => 'required',
            'direction_id' => 'required',
            'company_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'position_id.required' => 'Position must be selected',
            'direction_id.required' => 'Please, select direction',
            'company_id.required' => 'Please, select company',
        ];
    }
}
