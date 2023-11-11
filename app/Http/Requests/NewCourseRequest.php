<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewCourseRequest extends FormRequest
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
            'course_title' => ['required', 'string', Rule::unique('courses', 'title')],
            'course_code' => ['required', 'string', Rule::unique('courses', 'code')],
            'course_unit' => ['required', 'integer']
        ];
    }

    
}
