<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'name'  => ['required', 'string'],
            'code'  => ['required', 'string'],
            'id'  => ['required', 'integer'],
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
            'code.required'           => 'Se requiere el código.',
            'code.string'           => 'El código debe ser textual.',
        ];
    }
}
