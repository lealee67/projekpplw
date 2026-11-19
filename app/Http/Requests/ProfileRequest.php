<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name'         => ['required', 'string', 'max:100'],
            'username'     => ['required', 'alpha_dash', 'max:20', Rule::unique('users')->ignore($this->user()->id)],
            'no_wa'        => ['nullable', 'digits_between:10,12'],
            'deskripsi'    => ['nullable', 'string', 'max:1000'],
            'institusi_id' => ['nullable', 'exists:institusi,id'],
            'wilayah_id'   => ['nullable', 'exists:wilayah,id'],
            'keahlian'     => ['nullable', 'array'],
            'keahlian.*'   => ['exists:keahlian,id'],
        ];
    }
}
