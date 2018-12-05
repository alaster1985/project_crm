<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactPerson extends FormRequest
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
            'position_id' => 'required',
            'direction_id' => 'required',
            'company_id' => 'required',
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
            'position_id.required' => 'Position must be selected',
            'direction_id.required' => 'Please, select direction',
            'company_id.required' => 'Please, select company',
            'contacts.0.contact.required_without_all' => 'Contacts must be specified',
            'contacts.0.contact.regex' => 'Follow to the format',
            'contacts.1.contact.regex' => 'Follow to the format mob 2',
            'contacts.2.contact.required_without_all' => 'Contacts must be specified',
            'contacts.2.contact.regex' => 'Follow to the format email',
        ];
    }
}
