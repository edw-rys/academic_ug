<?php

namespace App\Http\Requests\Admin\CouseSubject;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouseSubjectRequest extends FormRequest
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
            'teacher_id' => ['required', 'integer'],
            'course_id'  => ['required', 'integer'],
            'subject_id' => ['required', 'integer'],
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
            'teacher_id.required'          => 'Se debe seleccionar el profesor.',
            'teacher_id.integer'           => 'Se debe seleccionar el profesor.',
            'course_id.required'          => 'Se debe seleccionar el curso.',
            'course_id.integer'           => 'Se debe seleccionar el curso.',
            'subject_id.required'          => 'Se debe seleccionar la asignatura.',
            'subject_id.integer'           => 'Se debe seleccionar la asignatura.',

        ];
    }
}
