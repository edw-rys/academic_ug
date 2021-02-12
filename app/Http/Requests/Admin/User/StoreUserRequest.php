<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'name'      => ['required', 'string', 'min:3'],
            'email'     => ['required', 'string', 'email', Rule::unique('users', 'email')->where('status', 'active')],
            'last_name' => ['required', 'string', 'min:3'],
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required'           => 'Se requiere el correo.',
            'email.string'           => 'El correo debe ser textual.',
            'name.required'           => 'Se requiere el nombre.',
            'name.string'           => 'Nombre debe ser textual.',
            'last_name.required'           => 'Se require el apellido.',
            'last_name.string'           => 'El apellido debe ser textual.',
            'last_name.min'               => 'Escriba al menos 3 palabras en el apellido.',
            'name.min'               => 'Escriba al menos 3 palabras en el nombre.'
        ];
    }
}
