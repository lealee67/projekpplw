@extends('layouts.app')
@section('title', 'Edit Profil')
@section('content')
<form method="POST" action="{{ route('profile.update') }}" class="max-w-xl mx-auto bg-white p-6 rounded shadow space-y-3">
    @csrf @method('PUT')
    <h1 class="text-xl font-bold">Edit Profil</h1>
    <input name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded p-2">
    <input name="username" value="{{ old('username', $user->username) }}" class="w-full border rounded p-2">
    <input name="no_wa" value="{{ old('no_wa', $user->no_wa) }}" placeholder="No. WA" class="w-full border rounded p-2">
    <textarea name="deskripsi" rows="3" class="w-full border rounded p-2" placeholder="Tentang kamu">{{ old('deskripsi', $user->deskripsi) }}</textarea>
    <select name="institusi_id" class="w-full border rounded p-2">
        <option value="">Pilih institusi</option>
        @foreach ($institusi as $i)<option value="{{ $i->id }}" @selected(old('institusi_id', $user->institusi_id) == $i->id)>{{ $i->nama_institusi }}</option>@endforeach
    </select>
    <select name="wilayah_id" class="w-full border rounded p-2">
        <option value="">Pilih wilayah</option>
        @foreach ($wilayah as $w)<option value="{{ $w->id }}" @selected(old('wilayah_id', $user->wilayah_id) == $w->id)>{{ $w->nama_kabupaten_kota }}, {{ $w->nama_provinsi }}</option>@endforeach
    </select>
    <div>
        <div class="font-semibold mb-1">Keahlian</div>
        @foreach ($keahlian as $k)
            <label class="mr-3 text-sm"><input type="checkbox" name="keahlian[]" value="{{ $k->id }}" @checked($user->keahlian->contains($k->id))> {{ $k->nama_keahlian }}</label>
        @endforeach
    </div>
    <button class="bg-blue-600 text-white rounded px-4 py-2">Simpan</button>
</form>
@endsection
