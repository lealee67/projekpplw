@extends('layouts.app')
@section('title', 'Cari Partner')
@section('content')
<h1 class="text-2xl font-bold mb-4">Cari Partner</h1>
<form class="mb-5 flex gap-2">
    <input name="q" value="{{ request('q') }}" placeholder="Cari nama / username..." class="flex-1 border rounded p-2">
    <select name="keahlian" class="border rounded p-2">
        <option value="">Semua keahlian</option>
        @foreach ($keahlian as $k)<option value="{{ $k->id }}" @selected(request('keahlian') == $k->id)>{{ $k->nama_keahlian }}</option>@endforeach
    </select>
    <button class="bg-gray-900 text-white px-4 rounded">Cari</button>
</form>
<div class="grid md:grid-cols-2 gap-4">
@forelse ($partners as $p)
    <div class="bg-white p-4 rounded shadow">
        <div class="flex items-center gap-3 mb-2">
            <span class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 grid place-items-center font-semibold">{{ inisial($p->name) }}</span>
            <div>
                <div class="font-semibold">{{ $p->name }}</div>
                <div class="text-xs text-gray-500">{{ $p->institusi?->nama_institusi ?? '-' }}</div>
            </div>
        </div>
        <div class="flex flex-wrap gap-1 mb-2">
            @foreach ($p->keahlian as $k)<span class="text-xs bg-gray-100 px-2 py-1 rounded">{{ $k->nama_keahlian }}</span>@endforeach
        </div>
        <a href="{{ route('profile.show', $p) }}" class="text-sm text-blue-600">Lihat profil & portofolio →</a>
    </div>
@empty
    <p>Partner tidak ditemukan.</p>
@endforelse
</div>
<div class="mt-5">{{ $partners->links() }}</div>
@endsection
