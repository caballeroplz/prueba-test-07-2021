<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'ownerid'   => 'required|string|min:36|max:36',
            'value'     => 'nullable|string|min:1|max:255',
            'type'      => 'nullable|string|min:1|max:255',
                        
        ];
    }
}