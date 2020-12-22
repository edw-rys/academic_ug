<?php

namespace App\Http\Requests\Admin\Period;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeriodRequest extends FormRequest
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
        $date_format = config('app_academic.setting.date_format');
        return [
            'id'  => ['required', 'integer'],
            'name'  => ['required', 'string'],
            'start_date'    => ['required', 'date_format:"' . $date_format . '"'],
            'end_date'      => ['required', 'date_format:"' . $date_format . '"'],
        ];
    }
}
