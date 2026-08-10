<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'nama' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:user',
            'nip' => 'nullable|string|max:50',
            'username' => 'required|string|max:50|unique:user',
            'password' => 'required|string|min:8|confirmed',
            'id_user_level' => 'required|integer|exists:level_user,id_user_level',
            'is_active' => 'boolean',
        ];
    }
}