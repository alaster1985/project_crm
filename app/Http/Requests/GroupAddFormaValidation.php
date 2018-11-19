<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupAddFormaValidation extends FormRequest
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
            'group_name' => 'required|max:30|min:3',
            'start_date' => 'required|date',
            'finish_date' => 'required|date|after:start_date',
            'homecoming_date' => 'required|date|after_or_equal:finish_date',
            'direction_it' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'group_name.required' => 'Must be name',
            'group_name.max' => 'It\'s too long name. Max 30',
            'group_name.min' => 'It\'s too short name',
            'start_date.required' => 'Must be start_date',
            'start_date.date' => 'Start_date must be date format',
            'finish_date.required' => 'Must be finish_date',
            'finish_date.date' => 'Finish_date must be date format',
            'finish_date.after' => 'Finish_date must be later than start date',
            'homecoming_date.required' => 'Must be homecoming_date',
            'homecoming_date.date' => 'Homecoming_date must be date format',
            'homecoming_date.after_or_equal' => 'Homecoming_date must be later or equal than finish date',
            'direction_it.required' => 'Direction must be selected',
        ];
    }
}

