<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
        $users = DB::table('users')
            ->get(['id'])
            ->whereNotIn('id', Auth::id())
            ->pluck('id')
            ->toArray();

        return [
            'task_name' => 'required|max:45|min:3',
            'description' => 'required|max:500|min:5',
            'dead_line' => 'required|date|after_or_equal:today|before:today + 1 year',
            'user_id_doer' => [
                'required',
                Rule::in($users),
            ],
        ];
    }

    public function messages()
    {
        return [
            'task_name.required' => 'Must be task_name',
            'task_name.max' => 'Shorter please. Max 45',
            'description.required' => 'Must be description',
            'description.max' => 'Shorter please. Max 500',
            'dead_line.required' => 'Set dead_line, please',
            'dead_line.date' => 'Please, set dead_line as date',
            'dead_line.after_or_equal' => 'Please, set dead_line from today till "Bright future!"',
            'dead_line.before' => 'Please, set dead_line within one year (365 days)',
            'user_id_doer.required' => 'ChosenOne must be here',
            'user_id_doer.in' => 'Nice try ;) But set ChosenOne from this select',
        ];
    }
}
