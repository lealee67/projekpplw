@extends('layouts.app')
<<<<<<< HEAD

@section('title', $user->name)

@section('content')
<div class="max-w-6xl mx-auto py-4 sm:py-6 font-['Plus_Jakarta_Sans',sans-serif]">
    <div class="max-w-3xl mx-auto bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 overflow-hidden">

        <!-- Profile Header Banner (Warm Peach Gradient) -->
        <div class="bg-gradient-to-br from-[#FFE3D8] to-[#FFC6B3] p-6 sm:p-8">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-5">
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-5">
                    <!-- Avatar -->
                    <span class="w-20 h-20 rounded-3xl bg-white/95 text-[#F9633B] grid place-items-center text-2xl font-extrabold shadow-sm shrink-0">
                        {{ inisial($user->name) }}
                    </span>

                    <!-- Name, Username & Academic/Location Info -->
                    <div class="space-y-1.5">
                        <div class="flex flex-wrap items-center gap-2">
                            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">
                                {{ $user->name }}
                            </h1>
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-semibold bg-white/85 text-[#5336E2]">
                                &#64;{{ $user->username }}
                            </span>
                        </div>

                        <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-sm text-gray-700 font-medium">
                            <span class="inline-flex items-center gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#C2410C] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                    <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                                </svg>
                                <span>{{ $user->institusi?->nama_institusi }}</span>
                            </span>
                            <span class="text-gray-400">·</span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#C2410C] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                <span>{{ $user->wilayah?->nama_kabupaten_kota }}</span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Edit Profile Action (Owner Only) -->
                @if (auth()->id() === $user->id)
                    <div class="shrink-0">
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center justify-center gap-2 bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-5 py-2.5 font-semibold text-sm shadow-sm hover:shadow transition duration-200 whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 20h9"/>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                            </svg>
                            <span>Edit Profil</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Profile Body Content -->
        <div class="p-6 sm:p-8 space-y-6">

            <!-- Sub-box: Tentang / Deskripsi -->
            <div class="bg-[#F3F4F6] rounded-2xl p-5 space-y-2">
                <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#F9633B]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span>Tentang</span>
                </div>
                <p class="text-sm sm:text-base text-gray-900 leading-relaxed">
                    {{ $user->deskripsi ?? 'Belum ada deskripsi.' }}
                </p>
            </div>

            <!-- Sub-box: Keahlian -->
            <div class="bg-[#F3F4F6] rounded-2xl p-5 space-y-3">
                <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#5336E2]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                    <span>Keahlian</span>
                </div>
                <div class="flex flex-wrap gap-2">
                    @foreach ($user->keahlian as $k)
                        <span class="inline-flex items-center text-xs font-semibold bg-[#DCFCE7] text-[#15803D] px-3.5 py-1.5 rounded-full">
                            {{ $k->nama_keahlian }}
                        </span>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
=======
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
>>>>>>> e1589bd7f2265adc53f486181f44d8f0a06c92c2
</div>
@endsection
