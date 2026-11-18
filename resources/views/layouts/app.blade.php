<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Temu.in')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
<nav class="bg-white border-b">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center gap-5 text-sm">
        <a href="{{ route('rooms.index') }}" class="font-bold text-lg text-orange-600">Temu.in</a>
        @auth
            <a href="{{ route('rooms.index') }}">Jelajah Proyek</a>
            <a href="{{ route('partners.index') }}">Cari Partner</a>
            <a href="{{ route('rooms.saya') }}">Proyek Saya</a>
            <a href="{{ route('requests.index') }}">Notifikasi</a>
            <a href="{{ route('rooms.create') }}" class="bg-gray-900 text-white px-3 py-1.5 rounded">+ Buat Proyek</a>
            <span class="ml-auto flex items-center gap-3">
                <a href="{{ route('profile.show', auth()->user()) }}" class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 grid place-items-center font-semibold">{{ inisial(auth()->user()->name) }}</span>
                    {{ auth()->user()->name }}
                </a>
                <form method="POST" action="{{ route('logout') }}">@csrf
                    <button class="text-red-600">Logout</button>
                </form>
            </span>
        @else
            <span class="ml-auto"><a href="{{ route('login') }}">Login</a> · <a href="{{ route('register') }}">Daftar</a></span>
        @endauth
    </div>
</nav>

<main class="max-w-6xl mx-auto px-4 py-6">
    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="mb-4 p-3 rounded bg-red-100 text-red-800">
            <ul class="list-disc ml-5">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif
    @yield('content')
</main>
</body>
</html>
