<?php

namespace App\Http\Requests\Admin\CourseStudent;

use App\Models\CourseStudent;
use App\Models\User;
use App\Rules\Exist;
use Illuminate\Foundation\Http\FormRequest;

class CourseStudentRequest extends FormRequest
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
            'course_subject_id' => ['required', 'integer', new Exist(new CourseStudent())],
            'student_id' => ['required', 'integer', new User()],
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
            'course_subject_id.required'          => 'Se debe seleccionar el curso.',
            'course_subject_id.integer'           => 'Se debe seleccionar el curso.',
            'student_id.required'          => 'Se debe seleccionar el estudiante.',
            'student_id.integer'           => 'Se debe seleccionar el estudiante.',
        ];
    }
}
