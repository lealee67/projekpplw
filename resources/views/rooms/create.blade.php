@extends('layouts.app')
@section('title', 'Publikasi Proyek')
@section('content')
<form method="POST" action="{{ route('rooms.store') }}" class="max-w-2xl mx-auto bg-white p-6 rounded shadow space-y-3">
    @csrf
    <h1 class="text-xl font-bold">Publikasikan Proyek & Bentuk Tim</h1>
    <input name="nama_room" value="{{ old('nama_room') }}" placeholder="Nama proyek" class="w-full border rounded p-2">
    <textarea name="deskripsi" rows="4" placeholder="Problem statement & solusi (min. 20 karakter)" class="w-full border rounded p-2">{{ old('deskripsi') }}</textarea>
    <div class="grid grid-cols-2 gap-3">
        <input name="kapasitas" type="number" value="{{ old('kapasitas', 5) }}" placeholder="Kapasitas tim" class="border rounded p-2">
        <input name="lokasi" value="{{ old('lokasi') }}" placeholder="Lokasi (opsional)" class="border rounded p-2">
        <input name="no_wa" value="{{ old('no_wa') }}" placeholder="No. WA (opsional)" class="border rounded p-2">
        <input name="tags" value="{{ old('tags') }}" placeholder="Tags" class="border rounded p-2">
    </div>
    <input name="link_groupchat" value="{{ old('link_groupchat') }}" placeholder="Link grup chat (opsional)" class="w-full border rounded p-2">

    <h2 class="font-semibold pt-2">Role yang dibutuhkan</h2>
    @for ($i = 0; $i < 3; $i++)
    <div class="grid grid-cols-3 gap-3">
        <input name="roles[{{ $i }}][nama_role]" value="{{ old("roles.$i.nama_role") }}" placeholder="Contoh: UI/UX Designer" class="col-span-2 border rounded p-2">
        <input name="roles[{{ $i }}][jumlah_dibutuhkan]" type="number" value="{{ old("roles.$i.jumlah_dibutuhkan", 1) }}" class="border rounded p-2">
    </div>
    @endfor
    <button class="bg-blue-600 text-white rounded px-4 py-2">Publikasikan</button>
</form>
@endsection
