@extends('layouts.app')
@section('title', 'Proyek Saya')
@section('content')
<h1 class="text-2xl font-bold mb-4">Proyek Saya</h1>
<div class="grid md:grid-cols-2 gap-4">
@forelse ($rooms as $room)
    <a href="{{ route('team.show', $room) }}" class="bg-white p-4 rounded shadow block hover:ring-2 ring-blue-300">
        <h2 class="font-semibold">{{ $room->nama_room }}</h2>
        <p class="text-xs text-gray-500">Pemilik: {{ $room->pembuat->name }}</p>
        <span class="text-xs text-blue-600">Masuk Team Space →</span>
    </a>
@empty
    <p>Kamu belum tergabung di proyek manapun.</p>
@endforelse
</div>
@endsection
