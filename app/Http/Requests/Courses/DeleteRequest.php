<?php

namespace App\Http\Requests\Courses;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeleteRequest extends FormRequest
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
        //dd(substr($this->route('course'), -1));
        // $this->course = substr($this->route('course'), -1);
        return [
            //
            'course' => [
                'required',
                Rule::exists(Course::class, 'id'),
            ]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['course' => substr($this->route('course'), -1)]);
    }
}
