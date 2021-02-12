<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'id'        => ['required', 'integer'],
            'name'      => ['required', 'string','min:3' ],
            'last_name' => ['required', 'string', ],
            'password'  => ['nullable', 'string','min:3' ]
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
            'id.required'          => 'Se requiere id.',
            'id.integer'           => 'Id debe ser numérico.',
            'name.required'           => 'Se requiere el nombre.',
            'name.string'           => 'Nombre debe ser textual.',
            'password.required'           => 'Se require contraseña.',
            'password.string'           => 'La contraseña debe ser textual.',
            'last_name.min'               => 'Escriba al menos 3 palabras en el apellido.',
            'name.min'               => 'Escriba al menos 3 palabras en el nombre.'
        ];
    }
}
