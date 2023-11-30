<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:254',
            'credits' => 'sometimes|string|max:4',
            'start' => 'sometimes|date|max:10',
            'end' => 'sometimes|date|max:10',
            'no_of_students' => 'sometimes|int|max:999'
        ];
    }

    public function messages():array{
        return [
            // 'name.required' => 'The name feild is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field cannot be more than 254 characters.',

            // 'credits.required' => 'The credits feild is required.',
            'credits.string' => 'The credits field must be a string.',
            'credits.max' => 'The credits field cannot be more than 4 characters.',

            // 'start.required' => 'The start feild is required.',
            'start.string' => 'The start field must be in date format.',
            'start.max' => 'The start field cannot be more than 10 characters.',

            // 'end.required' => 'The end feild is required.',
            'end.string' => 'The end field must be in date format.',
            'end.max' => 'The end field cannot be more than 10 characters.',

            // 'no_of_students.required' => 'The no_of_students feild is required.',
            'no_of_students.string' => 'The no_of_students field must be in date format.',
            'no_of_students.max' => 'The no_of_students field value cannot be more than 999.',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
    
        throw new HttpResponseException(response()->json([
            'message' => 'Validation failed',
            'errors' => $errors,
        ], 422));
    }

}
