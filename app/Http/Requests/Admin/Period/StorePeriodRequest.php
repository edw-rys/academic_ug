<?php

namespace App\Http\Requests\Admin\Period;

use Illuminate\Foundation\Http\FormRequest;

class StorePeriodRequest extends FormRequest
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
        // dd($date_format);
        return [
            'name'          => ['required', 'string'],
            'start_date'    => ['required', 'date_format:"' . $date_format . '"'],
            'end_date'      => ['required', 'date_format:"' . $date_format . '"'],
            //
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
            'name.required'           => 'Se requiere el nombre.',
            'name.string'           => 'Nombre debe ser textual.',
            'start_date.required'           => 'Se requiere el fecha de inicio.',
            'start_date.date_format'           => 'Formato de fecha incorrecta.',
            'end_date.required'           => 'Se requiere el fecha de fin.',
            'end_date.date_format'           => 'Formato de fecha incorrecta.',
        ];
    }
}
