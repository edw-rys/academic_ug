<?php

namespace App\Http\Requests\User\Student\Class_;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'comment'  => ['required', 'string'],
            'class_id'  => ['required', 'integer'],
            'class_student_id' => ['required', 'integer'],
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
            'comment.required'          => 'Se debe comentar',
            'comment.string'            => 'El comentario debe ser textual.',
            'class_id.required'         => 'Clase no exste.',
            'class_id.numeric'          => 'Clase incorrecta.',
            'class_student_id.required' => '.',
            'class_student_id.numeric'  => '',
        ];
    }
}
