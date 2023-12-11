<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change to true if you want to perform authorization checks
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "username" => "required|unique:users",
            "email" => "required|email|unique:users",
            "phone" => "required|numeric|unique:users", 
            "password" => "required|min:8",
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            "phone.numeric" => "Phone must contain only numbers.",
            "username.unique" => "The username has already been taken.",
            "email.unique" => "The email has already been taken.",
            "phone.unique" => "The phone has already been taken.",
        ];
    }
}
