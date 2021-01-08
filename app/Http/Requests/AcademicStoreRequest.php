<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicStoreRequest extends FormRequest
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
            'id'                => ['required', 'array'],
            'id.*'              => ['required', 'integer'],
            'qualification'     => ['required', 'array'],
            'qualification.*'   => 'required|numeric|min:0|max:10',
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
            'qualification.required' => 'La calificación es requerida',
            'qualification.*.required' => 'La calificación es requerida',
            'qualification.*.numeric' => 'La calificación debe ser numérica',
            'qualification.*.max' => 'La calificación debe estar entre 0 y 10',
            'qualification.*.min' => 'La calificación debe estar entre 0 y 10',
        ];
    }
}
