<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreStudentRequest extends FormRequest
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
            'name' => 'required|string|max:512',
            'regNo' => 'required|string|max:10|unique:students,reg_no',
            'nic' => 'required|string|max:12|unique:students,nic',
            'address' => 'required|string|max:512',
            'contact' => 'required|string|max:12',
            'email' => 'required|email|max:150|unique:students,email',
            
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field cannot be more than 512 characters.',

            'reg_no.required' => 'The reg_no field is required.',
            'reg_no.string' => 'The reg_no field must be a string.',
            'reg_no.unique' => 'The reg_no has already been taken.',
            'reg_no.max' => 'The reg_no field cannot be more than 10 characters.',

            'nic.required' => 'The NIC field is required.',
            'nic.string' => 'The NIC field must be a string.',
            'nic.unique' => 'The NIC has already been taken.',
            'nic.max' => 'The NIC field cannot be more than 12 characters.',

            'address.required' => 'The address field is required.',
            'address.string' => 'The address field must be a string.',
            'address.max' => 'The address field cannot be more than 512 characters.',

            'contact.required' => 'The contact number field is required.',
            'contact.string' => 'The contact number field must be a string.',
            'contact.max' => 'The contact number field cannot be more than 12 characters.',

            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email format.',
            'email.unique' => 'The email has already been taken.',
            'email.max' => 'The email field cannot be more than 150 characters.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
    
        throw new HttpResponseException(response()->json([
            'message' => 'Validation failed',
            'errors' => $errors,
            'data' => null, // Include this line to provide additional context
        ], 422));
    }

}
