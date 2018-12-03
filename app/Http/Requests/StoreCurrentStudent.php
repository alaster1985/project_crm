<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StoreCurrentStudent extends FormRequest
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
        $groups = DB::table('groups')
            ->get(['id'])
            ->pluck('id')
            ->toArray();
        return [
            'group_id' => [
                'required',
                Rule::in($groups)
            ],
            'learning_status' => 'required',
            'file' => 'mimes:pdf|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'group_id.required' => 'Group must be selected',
            'group_id.in' => 'Nice try BRO ;) But set group from this select',
            'learning_status.required' => 'Please, select learning_status',
            'file.mime' => 'Nice try! But It was not a PDF',
            'file.max' => 'Wow! Please give me some a little smaller file',
        ];
    }
}
