<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nama_task'            => ['required', 'string', 'max:100'],
            'status_id'            => ['required', 'exists:status,id'],
            'anggota_id'           => ['nullable', 'exists:anggota_room,id'],
            'due_date'             => ['nullable', 'date', 'after_or_equal:today'],
            'link_attachment_task' => ['nullable', 'url'],
        ];
    }
}
