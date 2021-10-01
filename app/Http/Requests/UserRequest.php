<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $user = $this->route()->parameter('user');

        return [
            'name' => 'required|string|min:3|max:191',
            'celphone' => 'required|string',
            'email' => "required|email|max:191|unique:users,email," . $user,
            'password' => ($user ? 'nullable' : 'required') . '|string|min:8|max:191|confirmed',
            'password_confirmation' => $user ? 'nullable' : 'required',
            'branch' => 'required',
            'super' => 'boolean',
            'admin' => 'boolean',
        ];
    }
}
