<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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

    /*public function all($keys = null)
    {
        $input = parent::all($keys);
        $input['date'] = \DateTime::createFromFormat('Y-m-d', $input['date'])->format('d/m/Y');
        $this->replace($input);
        return parent::all($keys);
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lead' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'comments' => 'required|string|min:10',
        ];
    }
}
