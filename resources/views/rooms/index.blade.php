@extends('layouts.app')

@section('title', 'Jelajah Proyek')

@section('content')
<div class="max-w-7xl mx-auto space-y-8 font-['Plus_Jakarta_Sans',sans-serif]">

    <!-- Hero Banner (Warm Peach Gradient) -->
    <div class="bg-gradient-to-br from-[#FFE3D8] to-[#FFC6B3] rounded-3xl p-6 sm:p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div class="space-y-2 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold bg-white/85 text-[#C2410C]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>
                </svg>
                <span>Eksplorasi Room Kolaborasi</span>
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">
                Jelajah Proyek
            </h1>
            <p class="text-sm sm:text-base text-gray-700">
                Temukan proyek mahasiswa yang sedang membuka rekrutmen, pilih role sesuai keahlianmu, dan mulai berkolaborasi.
            </p>
        </div>

        <div class="shrink-0 hidden sm:flex items-center justify-center w-16 h-16 rounded-3xl bg-white/85 text-[#F9633B] shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polygon points="12 2 2 7 12 12 22 7 12 2"/>
                <polyline points="2 17 12 22 22 17"/>
                <polyline points="2 12 12 17 22 12"/>
            </svg>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white rounded-3xl p-4 sm:p-5 border border-gray-100 shadow-sm">
        <form class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.3-4.3"/>
                    </svg>
                </div>
                <input
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Cari judul atau kata kunci..."
                    class="w-full pl-11 pr-5 py-2.5 bg-[#F3F4F6] border border-transparent rounded-full text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                >
            </div>

            <button
                type="submit"
                class="inline-flex items-center justify-center gap-2 bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-6 py-2.5 font-semibold text-sm shadow-sm hover:shadow transition duration-200 cursor-pointer shrink-0"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.3-4.3"/>
                </svg>
                <span>Cari</span>
            </button>
        </form>
    </div>

    <!-- Rooms / Projects Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($rooms as $room)
            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between">
                <div>
                    <!-- Card Top Badge -->
                    <div class="flex items-center justify-between gap-2 mb-3">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#EDE9FE] text-[#5B21B6]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                            </svg>
                            <span>Proyek Tim</span>
                        </span>
                    </div>

                    <!-- Room Title & Description -->
                    <h2 class="font-extrabold tracking-tight text-lg text-gray-900 line-clamp-1">
                        {{ $room->nama_room }}
                    </h2>
                    <p class="text-sm text-gray-500 mt-2 mb-4 leading-relaxed">
                        {{ Str::limit($room->deskripsi, 120) }}
                    </p>

                    <!-- Sub-box: Open Roles & Slots -->
                    <div class="bg-[#F3F4F6] rounded-2xl p-3.5 mb-5">
                        <div class="text-[11px] font-semibold uppercase tracking-wider text-gray-500 mb-2">
                            Role Dibutuhkan
                        </div>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach ($room->roles as $role)
                                <span class="inline-flex items-center text-xs font-semibold bg-[#DCFCE7] text-[#15803D] px-2.5 py-1 rounded-full">
                                    {{ $role->nama_role }} ({{ $role->sisa_slot }} slot)
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Card Footer: Author, Date & Detail Link -->
                <div class="pt-4 border-t border-gray-100 space-y-3">
                    <div class="flex items-center justify-between text-xs text-gray-500">
                        <span class="inline-flex items-center gap-1.5 truncate">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            <span class="truncate">oleh <strong class="font-semibold text-gray-700">{{ $room->pembuat->name }}</strong> · {{ tgl_indo($room->created_at) }}</span>
                        </span>
                    </div>

                    <a href="{{ route('rooms.show', $room) }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-full bg-[#FFEDD5] hover:bg-[#F9633B] text-[#C2410C] hover:text-white text-xs sm:text-sm font-semibold transition duration-200 group">
                        <span>Lihat detail</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"/>
                            <path d="m12 5 7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <!-- Empty State -->
            <div class="col-span-full bg-white rounded-3xl p-12 border border-gray-100 shadow-sm text-center flex flex-col items-center justify-center">
                <div class="w-14 h-14 rounded-2xl bg-[#F3F4F6] text-gray-400 grid place-items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                    </svg>
                </div>
                <p class="text-base font-extrabold tracking-tight text-gray-900">
                    Belum ada proyek.
                </p>
                <p class="text-sm text-gray-500 mt-1 max-w-md">
                    Jadilah yang pertama memublikasikan ide proyek dan mulai bentuk tim kolaborasimu!
                </p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="pt-2">
        {{ $rooms->links() }}
    </div>

</div>
@endsection
