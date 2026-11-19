@extends('layouts.app')

@section('title', 'Proyek Saya')

@section('content')
<div class="max-w-7xl mx-auto space-y-8 font-['Plus_Jakarta_Sans',sans-serif]">

    <!-- Hero Banner (Warm Peach Gradient) -->
    <div class="bg-gradient-to-br from-[#FFE3D8] to-[#FFC6B3] rounded-3xl p-6 sm:p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div class="space-y-2 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold bg-white/85 text-[#C2410C]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                </svg>
                <span>Workspace Kolaborasi</span>
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">
                Proyek Saya
            </h1>
            <p class="text-sm sm:text-base text-gray-700">
                Akses seluruh ruang kerja tim (Team Space) dari proyek yang kamu buat maupun proyek yang telah kamu ikuti.
            </p>
        </div>

        <div class="shrink-0 hidden sm:flex items-center justify-center w-16 h-16 rounded-3xl bg-white/85 text-[#F9633B] shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="7" height="7" x="3" y="3" rx="1"/>
                <rect width="7" height="7" x="14" y="3" rx="1"/>
                <rect width="7" height="7" x="14" y="14" rx="1"/>
                <rect width="7" height="7" x="3" y="14" rx="1"/>
            </svg>
        </div>
    </div>

    <!-- Grid Proyek Saya -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($rooms as $room)
            <a href="{{ route('team.show', $room) }}" class="group bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:border-[#F9633B]/30 transition duration-200 flex flex-col justify-between">
                <div>
                    <!-- Header Icon & Status Pill -->
                    <div class="flex items-center justify-between gap-2 mb-4">
                        <span class="w-11 h-11 rounded-2xl bg-[#EDE9FE] text-[#5B21B6] grid place-items-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                            </svg>
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#DCFCE7] text-[#15803D]">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#15803D]"></span>
                            <span>Aktif</span>
                        </span>
                    </div>

                    <!-- Nama Proyek -->
                    <h2 class="font-extrabold tracking-tight text-lg text-gray-900 group-hover:text-[#F9633B] transition line-clamp-1 mb-3">
                        {{ $room->nama_room }}
                    </h2>

                    <!-- Sub-box Pemilik Proyek -->
                    <div class="bg-[#F3F4F6] rounded-2xl p-3.5 mb-5 flex items-center gap-2.5 text-xs text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        <span class="truncate">
                            Pemilik: <strong class="font-semibold text-gray-800">{{ $room->pembuat->name }}</strong>
                        </span>
                    </div>
                </div>

                <!-- CTA Footer -->
                <div class="pt-4 border-t border-gray-100">
                    <span class="w-full inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-full bg-[#FFEDD5] group-hover:bg-[#F9633B] text-[#C2410C] group-hover:text-white text-xs sm:text-sm font-semibold transition duration-200">
                        <span>Masuk Team Space</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"/>
                            <path d="m12 5 7 7-7 7"/>
                        </svg>
                    </span>
                </div>
            </a>
        @empty
            <!-- Empty State -->
            <div class="col-span-full bg-white rounded-3xl p-12 border border-gray-100 shadow-sm text-center flex flex-col items-center justify-center">
                <div class="w-14 h-14 rounded-2xl bg-[#F3F4F6] text-gray-400 grid place-items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                    </svg>
                </div>
                <p class="text-base font-extrabold tracking-tight text-gray-900">
                    Kamu belum tergabung di proyek manapun.
                </p>
                <p class="text-sm text-gray-500 mt-1 max-w-md">
                    Mulai jelajahi proyek yang tersedia atau buat ruang proyekmu sendiri untuk berkolaborasi bersama mahasiswa lain.
                </p>
            </div>
        @endforelse
    </div>

</div>
@endsection
