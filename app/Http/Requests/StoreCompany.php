<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
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
            'company_name' => 'required|max:45',
            'address' => 'required|max:255',
            'status' => 'required',
            'type' => 'required',
            'site' => 'required|max:45',
            'stacks.0.stack_id' => 'required_without_all:stacks.1.stack_id,stacks.2.stack_id',
            'stacks.1.stack_id' => 'required_without_all:stacks.0.stack_id,stacks.2.stack_id',
            'stacks.2.stack_id' => 'required_without_all:stacks.0.stack_id,stacks.1.stack_id',
        ];
    }
    public function messages()
    {
        return [
            'company_name.required' => 'Must be company_name',
            'company_name.max' => 'Too long company_name. Max 45',
            'address.required' => 'Must be address',
            'address.max' => 'Too long address. Max 255',
            'status.required' => 'Status must be selected',
            'type.required' => 'Please, select type',
            'site.required' => 'Please, enter company site',
            'site.max' => 'Too long site. Max 45',
            'stacks.0.stack_id.required_without_all' => 'At least one stack must be specified',
        ];
    }
}
