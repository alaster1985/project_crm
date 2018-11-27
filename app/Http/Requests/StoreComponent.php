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
            'skill_name' => 'required_without_all:stack_name,position,direction|max:45|min:2|unique:skills',
            'stack_name' => 'required_without_all:position,direction,skill_name|max:45|min:3|unique:stacks',
            'position' => 'required_without_all:stack_name,direction,skill_name|max:45|min:3|unique:positions',
            'direction' => 'required_without_all:stack_name,position,skill_name|max:45|min:2|unique:directions',
        ];
    }
    public function messages()
    {
        return [
            'skill_name.required_without_all' => 'ничего не добавленно',
            'stack_name.required_without_all' => 'ничего не добавленно',
            'position.required_without_all' => 'ничего не добавленно',
            'direction.required_without_all' => 'ничего не добавленно',
            'skill_name.max' => 'слишком много букаф, 45 - предел',
            'stack_name.max' => 'слишком много букаф, 45 - предел',
            'position.max' => 'слишком много букаф, 45 - предел',
            'direction.max' => 'слишком много букаф, 45 - предел',
            'skill_name.min' => 'слишком мала букаф',
            'stack_name.min' => 'слишком мала букаф',
            'position.min' => 'слишком мала букаф',
            'direction.min' => 'слишком мала букаф',
            'skill_name.unique' => 'такой скилль уже есть',
            'stack_name.unique' => 'такой стэккЪ уже есть',
            'position.unique' => 'такая должность уже присутствует',
            'direction.unique' => 'направление дублируется',
        ];
    }
}
