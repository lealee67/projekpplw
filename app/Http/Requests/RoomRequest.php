<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    // Buang baris role yang kosong sebelum divalidasi
    protected function prepareForValidation(): void
    {
        $roles = collect($this->input('roles', []))
            ->filter(fn ($r) => filled($r['nama_role'] ?? null))->values()->all();
        $this->merge(['roles' => $roles]);
    }

    public function rules(): array
    {
        return [
            'nama_room'      => ['required', 'string', 'max:50'],
            'deskripsi'      => ['required', 'string', 'min:20'],
            'kapasitas'      => ['required', 'integer', 'min:2', 'max:20'],
            'no_wa'          => ['nullable', 'digits_between:10,12'],
            'lokasi'         => ['nullable', 'string', 'max:50'],
            'tags'           => ['nullable', 'string', 'max:40'],
            'link_groupchat' => ['nullable', 'url', 'max:40'],
            'roles'                      => ['required', 'array', 'min:1', 'max:5'],
            'roles.*.nama_role'          => ['required', 'string', 'max:50'],
            'roles.*.jumlah_dibutuhkan'  => ['required', 'integer', 'min:1', 'max:10'],
        ];
    }

    public function attributes(): array
    {
        return [
            'nama_room' => 'nama project',
            'roles.*.nama_role' => 'nama role',
            'roles.*.jumlah_dibutuhkan' => 'jumlah dibutuhkan',
        ];
    }
}
