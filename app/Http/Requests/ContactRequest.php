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

    public function all($keys = null)
    {
        $input = parent::all($keys);
        $input['date'] = date('d/m/Y', strtotime($input['date']));
        $this->replace($input);
        return parent::all($keys);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lead' => 'required',
            'date' => 'required|date_format:d/m/Y|after_or_equal:' . date('d/m/Y'),
            'time' => 'required',
            'comments' => 'required|string|min:10',
        ];
    }
}
