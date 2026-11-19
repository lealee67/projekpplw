@extends('layouts.app')

@section('title', 'Cari Partner')

@section('content')
<div class="max-w-7xl mx-auto space-y-8 font-['Plus_Jakarta_Sans',sans-serif]">

    <!-- Hero Banner (Warm Peach Gradient) -->
    <div class="bg-gradient-to-br from-[#FFE3D8] to-[#FFC6B3] rounded-3xl p-6 sm:p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div class="space-y-2 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold bg-white/85 text-[#C2410C] shadow-xs">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                <span>Eksplorasi Kolaborator</span>
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">
                Cari Partner
            </h1>
            <p class="text-sm sm:text-base text-gray-700">
                Temukan rekan mahasiswa dengan keahlian yang sesuai untuk membangun proyek, riset, dan tim lomba impianmu.
            </p>
        </div>

        <div class="shrink-0 hidden sm:flex items-center justify-center w-16 h-16 rounded-3xl bg-white/80 text-[#F9633B] shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"/>
                <path d="m21 21-4.3-4.3"/>
            </svg>
        </div>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-3xl p-4 sm:p-5 border border-gray-100 shadow-sm">
        <form class="flex flex-col md:flex-row items-stretch md:items-center gap-3">
            <!-- Search Input (Capsule / Pill) -->
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
                    placeholder="Cari nama / username..."
                    class="w-full pl-11 pr-5 py-2.5 bg-[#F3F4F6] border border-transparent rounded-full text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                >
            </div>

            <!-- Skill Filter Select -->
            <div class="relative md:w-64">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>
                    </svg>
                </div>
                <select
                    name="keahlian"
                    class="w-full pl-10 pr-9 py-2.5 bg-[#F3F4F6] border border-transparent rounded-full text-sm font-medium text-gray-700 focus:bg-white focus:border-[#5336E2] focus:ring-2 focus:ring-[#5336E2]/20 focus:outline-none transition appearance-none cursor-pointer"
                >
                    <option value="">Semua keahlian</option>
                    @foreach ($keahlian as $k)
                        <option value="{{ $k->id }}" @selected(request('keahlian') == $k->id)>{{ $k->nama_keahlian }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </div>
            </div>

            <!-- Primary Submit Button -->
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

    <!-- Partner Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($partners as $p)
            <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition duration-200 flex flex-col justify-between">
                <div>
                    <!-- Header: Avatar + Identity -->
                    <div class="flex items-center gap-3.5 mb-4">
                        <span class="w-12 h-12 rounded-2xl bg-[#EDE9FE] text-[#5B21B6] grid place-items-center font-extrabold text-base shrink-0">
                            {{ inisial($p->name) }}
                        </span>
                        <div class="min-w-0">
                            <div class="font-extrabold tracking-tight text-base text-gray-900 truncate">
                                {{ $p->name }}
                            </div>
                            <div class="flex items-center gap-1.5 text-xs text-gray-500 mt-0.5 truncate">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                    <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                                </svg>
                                <span class="truncate">{{ $p->institusi?->nama_institusi ?? '-' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Sub-box Keahlian / Skills -->
                    <div class="bg-[#F3F4F6] rounded-2xl p-3.5 mb-5">
                        <div class="text-[11px] font-semibold uppercase tracking-wider text-gray-500 mb-2">
                            Keahlian
                        </div>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach ($p->keahlian as $k)
                                <span class="inline-flex items-center text-xs font-semibold bg-[#DCFCE7] text-[#15803D] px-2.5 py-1 rounded-full">
                                    {{ $k->nama_keahlian }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Action Footer -->
                <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                    <a href="{{ route('profile.show', $p) }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-full bg-[#FFEDD5] hover:bg-[#F9633B] text-[#C2410C] hover:text-white text-xs sm:text-sm font-semibold transition duration-200 group">
                        <span>Lihat profil & portofolio</span>
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
                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.3-4.3"/>
                    </svg>
                </div>
                <p class="text-base font-extrabold tracking-tight text-gray-900">
                    Partner tidak ditemukan.
                </p>
                <p class="text-sm text-gray-500 mt-1 max-w-md">
                    Coba gunakan kata kunci nama lain atau reset filter keahlian untuk melihat lebih banyak mahasiswa.
                </p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="pt-2">
        {{ $partners->links() }}
    </div>

</div>
@endsection
