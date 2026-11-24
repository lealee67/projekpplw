<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nama_task'            => ['required', 'string', 'max:100'],
            'status_id'            => ['required', 'exists:status,id'],
            'anggota_id'           => ['nullable', Rule::exists('anggota_room','id')->where
                                        ('room_id', $this->route('room')->id),],
            'due_date'             => ['nullable', 'date', 'after_or_equal:today'],
            'link_attachment_task' => ['nullable', 'url'],
        ];
    }
}
