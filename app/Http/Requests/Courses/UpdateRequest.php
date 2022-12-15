<?php

namespace App\Http\Requests\Courses;

use App\Models\Course;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $course = substr($this->course, -1);
        return [
            //
            "name" => [
                "required",
                "string",
                "min:4",
                Rule::unique(Course::class)->ignore($course),
            ],
        ];
    }
}
