@extends('layouts.app')
@section('title', 'Notifikasi')
@section('content')
<h1 class="text-2xl font-bold mb-4">Notifikasi & Pengajuan</h1>

<h2 class="font-semibold mb-2">Pengajuan masuk ke proyekmu</h2>
<div class="space-y-3 mb-8">
@forelse ($masuk as $r)
    <div class="bg-white p-4 rounded shadow flex items-center justify-between">
        <div>
            <a href="{{ route('profile.show', $r->user) }}" class="font-semibold text-blue-600">{{ $r->user->name }}</a>
            melamar sebagai <b>{{ $r->role->nama_role }}</b> di <b>{{ $r->room->nama_room }}</b>
            <div class="text-xs text-gray-500">{{ tgl_indo($r->tanggal_request) }}</div>
        </div>
        <div class="flex gap-2">
            <form method="POST" action="{{ route('requests.approve', [$r->room, $r]) }}">@csrf<button class="bg-green-600 text-white px-3 py-1 rounded">Terima</button></form>
            <form method="POST" action="{{ route('requests.reject', [$r->room, $r]) }}">@csrf<button class="bg-red-600 text-white px-3 py-1 rounded">Tolak</button></form>
        </div>
    </div>
@empty
    <p class="text-sm text-gray-500">Tidak ada pengajuan baru.</p>
@endforelse
</div>

<h2 class="font-semibold mb-2">Pengajuan saya</h2>
<div class="space-y-3">
@forelse ($keluar as $r)
    <div class="bg-white p-4 rounded shadow flex items-center justify-between">
        <span>{{ $r->room->nama_room }} — {{ $r->role->nama_role }}</span>
        <span class="text-xs px-2 py-1 rounded {{ badge_status($r->status) }}">{{ ucfirst($r->status) }}</span>
    </div>
@empty
    <p class="text-sm text-gray-500">Belum ada pengajuan.</p>
@endforelse
</div>
@endsection
