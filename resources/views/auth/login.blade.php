@extends('layouts.app')
@section('title', 'Login')
@section('content')
<form method="POST" action="{{ route('login') }}" class="max-w-sm mx-auto bg-white p-6 rounded shadow space-y-3">
    @csrf
    <h1 class="text-xl font-bold">Login</h1>
    <input name="email" type="email" value="{{ old('email') }}" placeholder="Email" class="w-full border rounded p-2">
    <input name="password" type="password" placeholder="Password" class="w-full border rounded p-2">
    <label class="text-sm"><input type="checkbox" name="remember"> Ingat saya</label>
    <button class="w-full bg-orange-600 text-white rounded p-2">Masuk</button>
</form>
@endsection
