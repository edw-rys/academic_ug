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
}
