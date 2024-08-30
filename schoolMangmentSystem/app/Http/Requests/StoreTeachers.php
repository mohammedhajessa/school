<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachers extends FormRequest
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
            'Email' => 'required|unique:teachers,Email,'.$this->id,
            'Password' => 'required|min:8',
            'Name_ar' => 'required',
            'Specialization_id' => 'required',
            'Gender_id' => 'required',
            'Joining_Date' => 'required|date|date_format:Y-m-d',
            'Address' => 'required',
            'Phone' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.unique' => 'البريد الإلكتروني موجود مسبقاً.',
            'password.required' => 'كلمة المرور مطلوبة.',
            'name_ar.required' => 'الاسم بالعربية مطلوب.',
            'name_en.required' => 'الاسم بالإنجليزية مطلوب.',
            'specialization_id.required' => 'التخصص مطلوب.',
            'gender_id.required' => 'الجنس مطلوب.',
            'joining_date.required' => 'تاريخ الانضمام مطلوب.',
            'address.required' => 'العنوان مطلوب.',
        ];
    }
}
