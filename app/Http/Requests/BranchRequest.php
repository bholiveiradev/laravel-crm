<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'document'  => 'required|string|min:11',
            'name'  => 'required|string|min:3|max:191',
            'alias' => 'required|string|min:3|max:191',
            'phone' => 'required|string|max:191',
            'celphone'  => 'nullable|string|max:191',
            'email' => 'required|email|max:191',
            'site'  => 'nullable|string|min:5|max:191',
            'zipcode'   => 'nullable|string|max:191',
            'address'   => 'required|string|min:3|max:191',
            'number'    => 'required|string|min:1|max:10',
            'district'  => 'required|string|max:191',
            'complement'    => 'nullable|string|max:191',
            'city'  => 'required|string|max:191',
            'state' => 'required|string|min:2|max:2',
            'active' => 'required|boolean'
        ];
    }
}
