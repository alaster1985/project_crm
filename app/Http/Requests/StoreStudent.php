<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


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
        return [
            'name' => 'required|max:45',
            'address' => 'required|max:255',
            'group_id' => 'required',
            'learning_status' => 'required',
            'contacts.0.contact' => 'required_without_all:contacts.1.contact,contacts.2.contact,contacts.3.contact,contacts.4.contact',
            'contacts.1.contact' => 'required_without_all:contacts.0.contact,contacts.2.contact,contacts.3.contact,contacts.4.contact',
            'contacts.2.contact' => 'required_without_all:contacts.0.contact,contacts.1.contact,contacts.3.contact,contacts.4.contact',
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
            'learning_status.required' => 'Please, select learning_status',
            'contacts.0.contact.required_without_all' => 'At least one contact must be specified',
        ];
    }
}
