@extends('layouts.app')
@section('title', 'Jelajah Proyek')
@section('content')
<h1 class="text-2xl font-bold mb-4">Jelajah Proyek</h1>
<form class="mb-5 flex gap-2">
    <input name="q" value="{{ request('q') }}" placeholder="Cari judul atau kata kunci..." class="flex-1 border rounded p-2">
    <button class="bg-gray-900 text-white px-4 rounded">Cari</button>
</form>

<div class="grid md:grid-cols-2 gap-4">
@forelse ($rooms as $room)
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold text-lg">{{ $room->nama_room }}</h2>
        <p class="text-sm text-gray-600 my-2">{{ Str::limit($room->deskripsi, 120) }}</p>
        <div class="flex flex-wrap gap-1 mb-3">
            @foreach ($room->roles as $role)
                <span class="text-xs bg-gray-100 px-2 py-1 rounded">{{ $role->nama_role }} ({{ $role->sisa_slot }} slot)</span>
            @endforeach
        </div>
        <div class="flex justify-between text-xs text-gray-500">
            <span>oleh {{ $room->pembuat->name }} · {{ tgl_indo($room->created_at) }}</span>
            <a href="{{ route('rooms.show', $room) }}" class="text-blue-600">Lihat detail →</a>
        </div>
    </div>
@empty
    <p>Belum ada proyek.</p>
@endforelse
</div>
<div class="mt-5">{{ $rooms->links() }}</div>
@endsection
