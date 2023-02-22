<?php

namespace App\Http\Requests\auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            "email" => [
                "bail",
                "required",
                "email",
                "string",
                Rule::unique(User::class),
            ],
            "password" => [
                "bail",
                "required",
                "min:6",
                "string",
                "confirmed"
            ],
            "name" => [
                'bail',
                'required',
                'string',
            ]
        ];
    }
}
