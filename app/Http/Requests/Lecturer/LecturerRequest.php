<?php

namespace App\Http\Requests\Lecturer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LecturerRequest extends FormRequest
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
            'lecturerID' => 'int|max:8|exists:lecturers,lecturer_id'
        ];
    }

    public function messages():array
    {
        return [
            'lecturerID.int' => 'The studentID field must be a integer',
            'lecturerID.max' => 'The studentID field can not be more than 8 characters',
            'lecturerID.exists' => 'The studentID not found',
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
