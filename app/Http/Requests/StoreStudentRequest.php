<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|string|max:100',
            'reg_no' => 'required|string|max:10',
            'nic' => 'required|string|max:12',
            'address' => 'required|string|max:512',
            'contact' => 'required|string|max:12',
            'email' => 'required|email|max:150',
            
        ];
    }
}
