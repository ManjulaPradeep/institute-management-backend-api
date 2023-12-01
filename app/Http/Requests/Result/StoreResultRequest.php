<?php

namespace App\Http\Requests\Result;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreResultRequest extends FormRequest
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
            'marks' => 'required|int|max:100',
            'grade' => 'required|string|max:100'
        ];
    }

    public function messages():array
    {
        return [
            'marks.required' => 'The marks field is required.',
            'marks.int' => 'The marks field must be a integer.',
            'marks.max' => 'The marks field must be less than 100.',

            'grade.required' => 'The grade field is required.',
            'grade.int' => 'The grade field must be a string.',
            'grade.max' => 'The grade field must be less than 100 characters.',
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
