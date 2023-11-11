<?php

namespace App\Http\Requests;

use App\Utils\Utility;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewStudentRequest extends FormRequest
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
            'name' => ['required', 'regex:(\\w)'],
            'matric' => ['required', Rule::unique('students', 'matric')],
            'level' => ['required', Rule::in(array_values(Utility::STUDENT_LEVELS))],
            'school' => ['required', Rule::exists('schools', 'id')]
        ];
    }
}
