<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            "firstname" => [
                "bail",
                "required",
                "min:4",
                "string",
            ],
            "lastname" => [
                "bail",
                "required",
                "min:4",
                "string",
            ],
            "year" => [
                "bail",
                "required",
                "date",
            ],
            "gender" => [
                "bail",
                "required",
                "string",
            ],
            "status" => [
                "bail",
                "required",
                "integer"
            ],
            "course_id" => [
                "bail",
                "required",
                "integer"
            ],
            "avatar" => [
                "file",
                "image",
            ]
        ];
    }
    public function messages() // Thay doi hien thi tin nhan loi khi validate.
    {
        return [
            'name.required' => ':attribute phai dien',
            'name.unique' => ':attribute duy nhat',
        ];
    }
    public function attributes() // Thay doi ten 'name' as somthing(use to customs)
    {
        return [
            'name' => 'Ten khoa hoc',
        ];
    }
}
