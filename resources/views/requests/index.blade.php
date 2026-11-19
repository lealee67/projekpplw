@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')
<div class="max-w-7xl mx-auto space-y-8 font-['Plus_Jakarta_Sans',sans-serif]">

    <!-- Hero Banner (Warm Peach Gradient) -->
    <div class="bg-gradient-to-br from-[#FFE3D8] to-[#FFC6B3] rounded-3xl p-6 sm:p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div class="space-y-2 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold bg-white/85 text-[#C2410C]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/>
                    <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>
                </svg>
                <span>Pusat Kolaborasi</span>
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">
                Notifikasi & Pengajuan
            </h1>
            <p class="text-sm sm:text-base text-gray-700">
                Kelola permintaan anggota yang ingin bergabung ke proyekmu dan pantau status lamaran tim yang kamu ajukan.
            </p>
        </div>

        <div class="shrink-0 hidden sm:flex items-center justify-center w-16 h-16 rounded-3xl bg-white/85 text-[#F9633B] shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
            </svg>
        </div>
    </div>

    <!-- Section 1: Pengajuan Masuk ke Proyekmu -->
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <span class="w-9 h-9 rounded-2xl bg-[#FFEDD5] text-[#C2410C] grid place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/>
                        <path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/>
                    </svg>
                </span>
                <h2 class="text-lg sm:text-xl font-extrabold tracking-tight text-gray-900">
                    Pengajuan masuk ke proyekmu
                </h2>
            </div>
        </div>

        <div class="space-y-4">
            @forelse ($masuk as $r)
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition duration-200 flex flex-col md:flex-row md:items-center justify-between gap-5">
                    <div class="flex items-start sm:items-center gap-4">
                        <span class="w-12 h-12 rounded-2xl bg-[#EDE9FE] text-[#5B21B6] grid place-items-center font-extrabold text-sm shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <polyline points="16 11 18 13 22 9"/>
                            </svg>
                        </span>

                        <div class="space-y-1.5">
                            <div class="text-sm sm:text-base text-gray-800 leading-relaxed">
                                <a href="{{ route('profile.show', $r->user) }}" class="font-extrabold text-[#5336E2] hover:underline">
                                    {{ $r->user->name }}
                                </a>
                                melamar sebagai
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#EDE9FE] text-[#5B21B6]">
                                    {{ $r->role->nama_role }}
                                </span>
                                di
                                <span class="font-bold text-gray-900">{{ $r->room->nama_room }}</span>
                            </div>

                            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-2xl bg-[#F3F4F6] text-xs font-medium text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                                <span>{{ tgl_indo($r->tanggal_request) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2.5 shrink-0 self-end md:self-center">
                        <form method="POST" action="{{ route('requests.approve', [$r->room, $r]) }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center gap-1.5 bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-5 py-2.5 font-semibold text-xs sm:text-sm shadow-sm hover:shadow transition duration-200 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                                <span>Terima</span>
                            </button>
                        </form>

                        <form method="POST" action="{{ route('requests.reject', [$r->room, $r]) }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center gap-1.5 bg-red-50 hover:bg-red-600 text-red-600 hover:text-white rounded-full px-5 py-2.5 font-semibold text-xs sm:text-sm transition duration-200 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"/>
                                    <line x1="6" y1="6" x2="18" y2="18"/>
                                </svg>
                                <span>Tolak</span>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm text-center flex flex-col items-center justify-center">
                    <div class="w-12 h-12 rounded-2xl bg-[#F3F4F6] text-gray-400 grid place-items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/>
                            <path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500 font-medium">Tidak ada pengajuan baru.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Section 2: Pengajuan Saya -->
    <div class="space-y-4">
        <div class="flex items-center gap-2.5">
            <span class="w-9 h-9 rounded-2xl bg-[#EDE9FE] text-[#5B21B6] grid place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"/>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                </svg>
            </span>
            <h2 class="text-lg sm:text-xl font-extrabold tracking-tight text-gray-900">
                Pengajuan saya
            </h2>
        </div>

        <div class="space-y-4">
            @forelse ($keluar as $r)
                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition duration-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-3.5">
                        <span class="w-11 h-11 rounded-2xl bg-[#FFEDD5] text-[#C2410C] grid place-items-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                            </svg>
                        </span>
                        <span class="text-sm sm:text-base font-bold text-gray-900">
                            {{ $r->room->nama_room }} <span class="text-gray-400 font-normal mx-1">—</span> <span class="text-[#5336E2] font-semibold">{{ $r->role->nama_role }}</span>
                        </span>
                    </div>

                    <span class="self-start sm:self-center inline-flex items-center text-xs font-semibold px-3.5 py-1.5 rounded-full {{ badge_status($r->status) }}">
                        {{ ucfirst($r->status) }}
                    </span>
                </div>
            @empty
                <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm text-center flex flex-col items-center justify-center">
                    <div class="w-12 h-12 rounded-2xl bg-[#F3F4F6] text-gray-400 grid place-items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"/>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500 font-medium">Belum ada pengajuan.</p>
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
