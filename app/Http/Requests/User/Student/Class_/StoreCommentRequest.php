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
}
