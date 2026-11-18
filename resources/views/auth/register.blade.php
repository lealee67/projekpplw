@extends('layouts.app')
@section('title', 'Daftar')
@section('content')
<form method="POST" action="{{ route('register') }}" class="max-w-sm mx-auto bg-white p-6 rounded shadow space-y-3">
    @csrf
    <h1 class="text-xl font-bold">Daftar Akun</h1>
    <input name="name" value="{{ old('name') }}" placeholder="Nama lengkap" class="w-full border rounded p-2">
    <input name="username" value="{{ old('username') }}" placeholder="Username" class="w-full border rounded p-2">
    <input name="email" type="email" value="{{ old('email') }}" placeholder="Email" class="w-full border rounded p-2">
    <input name="no_wa" value="{{ old('no_wa') }}" placeholder="No. WhatsApp (opsional)" class="w-full border rounded p-2">
    <input name="password" type="password" placeholder="Password" class="w-full border rounded p-2">
    <input name="password_confirmation" type="password" placeholder="Ulangi password" class="w-full border rounded p-2">
    <button class="w-full bg-orange-600 text-white rounded p-2">Daftar</button>
</form>
@endsection
