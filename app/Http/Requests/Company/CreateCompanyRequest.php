<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
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
            'name'          => 'required|string|min:2|max:255',
            'status'        => 'required|integer',
            'value'         => 'nullable|string|min:2|max:255',
            'type'          => 'nullable|string|min:2|max:255',
            'street'        => 'nullable|string|min:1|max:255',
            'streetnumber'  => 'nullable|string|min:1|max:10',
            'floor'         => 'nullable|string|min:1|max:50',
            'letter'        => 'nullable|string|min:1|max:10',
            'postalcode'    => 'nullable|string|min:2|max:12',
            'city'          => 'nullable|string|min:1|max:255',
            'province'      => 'nullable|string|min:1|max:255',
            'country'       => 'nullable|string|min:1|max:255'
        ];
    }
}
