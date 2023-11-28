<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'nic' => 'required|max:12|unique:students,nic,' . $this->student_id,
            'address' => 'required|string|max:512',
            'contact' => 'required|string|max:12',
            'email' => 'required|email|max:150|unique:students,email,' . $this->student_id,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a string.',
            'name.max' => 'The name field can not be more than 512 characters.',

            'nic.required' => 'The NIC field is required.',
            'nic.unique' => 'The NIC must be unique.',
            'nic.max' => 'The NIC field van not be more than 12 charackters.',

            'address.required' => 'The address field is required.',
            'address.string' => 'The address field must be a string.',
            'address.max' => 'The address field can not be more than 512 characters.',

            'contact.required' => 'The contact number field is required.',
            'contact.string' => 'The contact number field must be a string.',
            'contact.max' => 'The contact number field can not be more than 12 characters.',

            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email format.',
            'email.unique' => 'The email must be unique.',
            'email.max' => 'The email field can not be more than 150 characters.'
        ];
    }
}
