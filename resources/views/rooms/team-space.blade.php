@extends('layouts.app')
@section('title', 'Team Space')
@section('content')
<div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-bold">{{ $room->nama_room }} — Team Space</h1>
    <span class="text-sm text-gray-500">{{ $room->anggota->count() }} anggota</span>
</div>

<form method="POST" action="{{ route('team.resources', $room) }}" class="bg-white p-4 rounded shadow mb-5 flex gap-2">
    @csrf @method('PUT')
    <input name="link_groupchat" value="{{ old('link_groupchat', $room->link_groupchat) }}" placeholder="Link grup komunikasi" class="flex-1 border rounded p-2">
    <button class="bg-gray-900 text-white px-4 rounded">Simpan</button>
    @if ($room->link_groupchat)<a href="{{ $room->link_groupchat }}" target="_blank" class="self-center text-blue-600">Buka</a>@endif
</form>

<form method="POST" action="{{ route('team.tasks.store', $room) }}" class="bg-white p-4 rounded shadow mb-5 grid md:grid-cols-5 gap-2">
    @csrf
    <input name="nama_task" placeholder="Nama task" class="border rounded p-2 md:col-span-2">
    <select name="status_id" class="border rounded p-2">
        @foreach ($statuses as $s)<option value="{{ $s->id }}">{{ $s->nama_status }}</option>@endforeach
    </select>
    <select name="anggota_id" class="border rounded p-2">
        <option value="">Penanggung jawab</option>
        @foreach ($room->anggota as $a)<option value="{{ $a->id }}">{{ $a->user->name }}</option>@endforeach
    </select>
    <input name="due_date" type="date" class="border rounded p-2">
    <button class="bg-blue-600 text-white rounded p-2 md:col-span-5">+ Tambah Task</button>
</form>

<div class="grid md:grid-cols-4 gap-4">
@foreach ($statuses as $status)
    <div class="bg-gray-100 p-3 rounded">
        <h3 class="font-semibold mb-2">{{ $status->nama_status }} ({{ $status->tasks->count() }})</h3>
        @foreach ($status->tasks as $task)
            <div class="bg-white p-3 rounded shadow mb-2 text-sm">
                <div class="font-medium">{{ $task->nama_task }}</div>
                <div class="text-xs text-gray-500">{{ $task->anggota?->user->name ?? 'Belum ditugaskan' }} · {{ tgl_indo($task->due_date) }}</div>
                <form method="POST" action="{{ route('team.tasks.update', [$room, $task]) }}" class="mt-2 flex gap-1">
                    @csrf @method('PUT')
                    <input type="hidden" name="nama_task" value="{{ $task->nama_task }}">
                    <input type="hidden" name="anggota_id" value="{{ $task->anggota_id }}">
                    <select name="status_id" class="border rounded text-xs p-1" onchange="this.form.submit()">
                        @foreach ($statuses as $s)<option value="{{ $s->id }}" @selected($s->id == $task->status_id)>{{ $s->nama_status }}</option>@endforeach
                    </select>
                </form>
                <form method="POST" action="{{ route('team.tasks.destroy', [$room, $task]) }}" onsubmit="return confirm('Hapus task?')">
                    @csrf @method('DELETE')
                    <button class="text-xs text-red-600 mt-1">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>
@endforeach
</div>
@endsection
