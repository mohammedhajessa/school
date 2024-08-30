<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeSections extends FormRequest
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

            'Name_Section' => 'required',
            'Grade_id' => 'required',
            'Class_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'Name_Section' => 'اسم الشعبة مطلوب',
            'Grade_id.required' =>'اسم المرحلة مطلوب',
            'Class_id.required' => 'اسم الصف مطلوب',
        ];
    }
}
