<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTask extends FormRequest
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
            'task_name' => 'required|max:45',
            'description' => 'required',
            'dead_line' => 'required|date|after_or_equal:today',
            'user_id_doer' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'task_name.required' => 'Must be task_name',
            'task_name.max' => 'Shorter please. Max 45',
            'description.required' => 'Must be description',
            'dead_line.required' => 'Set dead_line, please',
            'dead_line.date' => 'Please, set dead_line as date',
            'dead_line.after_or_equal' => 'Please, set dead_line from today till "Bright future!"',
            'user_id_doer.required' => 'ChosenOne must be here',
        ];
    }
}
