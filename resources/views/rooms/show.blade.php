@extends('layouts.app')
@section('title', $room->nama_room)
@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold">{{ $room->nama_room }}</h1>
    <p class="text-sm text-gray-500 mb-3">Oleh <a class="text-blue-600" href="{{ route('profile.show', $room->pembuat) }}">{{ $room->pembuat->name }}</a> · {{ tgl_indo($room->created_at) }}</p>
    <p class="mb-4">{{ $room->deskripsi }}</p>

    <h2 class="font-semibold mb-2">Anggota Tim</h2>
    <ul class="mb-4 text-sm">
        @foreach ($room->anggota as $a)
            <li>✅ {{ $a->user->name }}</li>
        @endforeach
    </ul>

    @if ($sudahAnggota)
        <a href="{{ route('team.show', $room) }}" class="bg-green-600 text-white px-4 py-2 rounded">Masuk Team Space</a>
    @elseif ($sudahRequest)
        <span class="text-yellow-700">Pengajuanmu sedang diproses.</span>
    @else
        <form method="POST" action="{{ route('requests.store', $room) }}" class="flex gap-2">
            @csrf
            <select name="role_id" class="border rounded p-2">
                @foreach ($room->roles as $role)
                    <option value="{{ $role->id }}" @disabled($role->sisa_slot < 1)>{{ $role->nama_role }} (sisa {{ $role->sisa_slot }})</option>
                @endforeach
            </select>
            <button class="bg-gray-900 text-white px-4 rounded">Ajukan Diri</button>
        </form>
    @endif
</div>
@endsection
