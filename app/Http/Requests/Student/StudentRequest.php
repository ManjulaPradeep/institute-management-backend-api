<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StudentRequest extends FormRequest
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
            'studentID' => 'int|max:8|exists:students,student_id',
        ];
    }

    public function messages(): array
    {
        return [
            'studentID.int' => 'The studentID field must be a integer',
            'studentID.max' => 'The studentID field can not be more than 8 characters',
            'studentID.exists' => 'The studentID not found',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'message' => 'Validation failed',
            'errors' => $errors,
            'data' => null,
        ], 422));
    }
}
