@extends('layouts.app')
@section('title', $user->name)
@section('content')
<div class="bg-white p-6 rounded shadow max-w-2xl">
    <div class="flex items-center gap-4 mb-3">
        <span class="w-16 h-16 rounded-full bg-blue-100 text-blue-700 grid place-items-center text-xl font-bold">{{ inisial($user->name) }}</span>
        <div>
            <h1 class="text-xl font-bold">{{ $user->name }} <span class="text-sm text-gray-400">&#64;{{ $user->username }}</span></h1>
            <p class="text-sm text-gray-500">{{ $user->institusi?->nama_institusi }} · {{ $user->wilayah?->nama_kabupaten_kota }}</p>
        </div>
    </div>
    <p class="mb-3">{{ $user->deskripsi ?? 'Belum ada deskripsi.' }}</p>
    <div class="flex flex-wrap gap-1 mb-3">
        @foreach ($user->keahlian as $k)<span class="text-xs bg-gray-100 px-2 py-1 rounded">{{ $k->nama_keahlian }}</span>@endforeach
    </div>
    @if (auth()->id() === $user->id)
        <a href="{{ route('profile.edit') }}" class="bg-gray-900 text-white px-3 py-1.5 rounded text-sm">Edit Profil</a>
    @endif
</div>
@endsection
