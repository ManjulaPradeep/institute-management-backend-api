<?php

namespace App\Http\Requests\Parent;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateStParentRequest extends FormRequest
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
            'name' => 'sometimes|string|max:512',
            'contact' => 'sometimes|string|max:12',
            'email' => 'sometimes|email|max:150|unique:st_parents,email,'. $this->route('parentID') . ',id',   
    ];
    }

    
    public function messages(): array
    {
        return [
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field can not be more than 512 characters.',

            'contact.string' => 'The contact number field must be a string.',
            'contact.max' => 'The contact number field can not be more than 12 characters.',

            'email.email' => 'The email must be a valid email format.',
            'email.unique' => 'The email has already exists.',
            'email.max' => 'The email field can not be more than 150 characters.'
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
