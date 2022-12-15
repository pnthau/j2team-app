<?php

namespace App\Http\Requests\Courses;

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
            "name" => [
                "bail",
                "required",
                "min:4",
                "string",
                "unique:App\Models\Course,name",
            ]
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute phai dien',
            'name.unique' => ':attribute duy nhat',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Ten khoa hoc',
        ];
    }
}
