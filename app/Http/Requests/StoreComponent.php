<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComponent extends FormRequest
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
            'skill_name' => 'required_without_all:stack_name,position,direction',
            'stack_name' => 'required_without_all:position,direction,skill_name',
            'position' => 'required_without_all:stack_name,direction,skill_name',
            'direction' => 'required_without_all:stack_name,position,skill_name',
        ];
    }
    public function messages()
    {
        return [
            'skill_name.required_without_all' => 'ничего не добавленно',
            'stack_name.required_without_all' => 'ничего не добавленно',
            'position.required_without_all' => 'ничего не добавленно',
            'direction.required_without_all' => 'ничего не добавленно',
        ];
    }
}
