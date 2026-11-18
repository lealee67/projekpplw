<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:100'],
            'username' => ['required', 'alpha_dash', 'max:20', 'unique:users,username'],
            'email'    => ['required', 'email', 'max:200', 'unique:users,email'],
            'no_wa'    => ['nullable', 'digits_between:10,12'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ];
    }

    public function messages(): array
    {
        return [
            'username.unique' => 'Username sudah dipakai.',
            'email.unique'    => 'Email sudah terdaftar.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ];
    }
}
