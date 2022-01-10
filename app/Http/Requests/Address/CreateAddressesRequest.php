<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class CreateAddressesRequest extends FormRequest
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
            'street'        => 'nullable|string|min:1|max:255',
            'streetnumber'  => 'nullable|string|min:1|max:10',
            'floor'         => 'nullable|string|min:1|max:50',
            'letter'        => 'nullable|string|min:1|max:10',
            'postalcode'    => 'nullable|string|min:2|max:12',
            'city'          => 'nullable|string|min:1|max:255',
            'province'      => 'nullable|string|min:1|max:255',
            'country'       => 'nullable|string|min:1|max:255',
            'ownerid'       => 'required|string|min:36|max:36',
        ];
    }
}