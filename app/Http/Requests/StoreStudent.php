<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class StoreStudent extends FormRequest
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
            'name' => 'required|max:45',
            'address' => 'required|max:255',
            'group_id' => [
                'required',
                Rule::in($groups)
                ],
            'learning_status' => 'required',
            'file' => 'mimes:pdf|max:2048',
            'contacts.0.contact' => 'required_without_all:contacts.1.contact,contacts.2.contact,contacts.3.contact,contacts.4.contact|regex:/^\+380\d{3}\d{2}\d{2}\d{2}$/',
            'contacts.1.contact' => 'required_without_all:contacts.0.contact,contacts.2.contact,contacts.3.contact,contacts.4.contact|regex:/^\+380\d{3}\d{2}\d{2}\d{2}$/|nullable',
            'contacts.2.contact' => 'required_without_all:contacts.0.contact,contacts.1.contact,contacts.3.contact,contacts.4.contact|email',
            'contacts.3.contact' => 'required_without_all:contacts.0.contact,contacts.1.contact,contacts.2.contact,contacts.4.contact',
            'contacts.4.contact' => 'required_without_all:contacts.0.contact,contacts.1.contact,contacts.2.contact,contacts.3.contact',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Must be name',
            'name.max' => 'So long name. Max 45',
            'address.required' => 'Must be address',
            'address.max' => 'So long address. Max 255',
            'group_id.required' => 'Group must be selected',
            'group_id.in' => 'Nice try BRO ;) But set group from this select',
            'learning_status.required' => 'Please, select learning_status',
            'contacts.0.contact.required_without_all' => 'Contacts must be specified',
            'contacts.0.contact.regex' => 'Follow to the format mob 1',
            'contacts.1.contact.regex' => 'Follow to the format mob 2',
            'contacts.2.contact.required_without_all' => 'Contacts must be specified',
            'contacts.2.contact.email' => 'Follow to the format email',
            'file.mime' => 'Nice try! But It was not a PDF',
            'file.max' => 'Wow! Please give me some a little smaller file',
        ];
    }
}
