@extends('layouts.app')

@section('title', $room->nama_room)

@section('content')
<div class="max-w-6xl mx-auto py-4 sm:py-6 font-['Plus_Jakarta_Sans',sans-serif]">
    <div class="max-w-4xl mx-auto bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 overflow-hidden">

        <!-- Hero / Header Banner (Warm Peach Gradient) -->
        <div class="bg-gradient-to-br from-[#FFE3D8] to-[#FFC6B3] p-6 sm:p-8 flex flex-col md:flex-row md:items-center justify-between gap-5">
            <div class="space-y-2.5">
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold bg-white/85 text-[#C2410C]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                    </svg>
                    <span>Detail Room Proyek</span>
                </span>

                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">
                    {{ $room->nama_room }}
                </h1>

                <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-sm text-gray-700">
                    <span class="inline-flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#C2410C]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        <span>Oleh <a class="font-bold text-[#5336E2] hover:underline" href="{{ route('profile.show', $room->pembuat) }}">{{ $room->pembuat->name }}</a></span>
                    </span>
                    <span class="text-gray-400">·</span>
                    <span class="inline-flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#C2410C]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2"/>
                            <line x1="16" y1="2" x2="16" y2="6"/>
                            <line x1="8" y1="2" x2="8" y2="6"/>
                            <line x1="3" y1="10" x2="21" y2="10"/>
                        </svg>
                        <span>{{ tgl_indo($room->created_at) }}</span>
                    </span>
                </div>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-white/90 text-[#F9633B] grid place-items-center shadow-sm shrink-0 hidden sm:grid">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"/>
                    <polyline points="2 17 12 22 22 17"/>
                    <polyline points="2 12 12 17 22 12"/>
                </svg>
            </div>
        </div>

        <!-- Main Body Content -->
        <div class="p-6 sm:p-8 space-y-6">

            <!-- Sub-box: Deskripsi Proyek -->
            <div class="bg-[#F3F4F6] rounded-2xl p-5 space-y-2">
                <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#F9633B]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                    <span>Deskripsi & Latar Belakang</span>
                </div>
                <p class="text-sm sm:text-base text-gray-900 leading-relaxed">
                    {{ $room->deskripsi }}
                </p>
            </div>

            <!-- Sub-box: Anggota Tim -->
            <div class="bg-[#F3F4F6] rounded-2xl p-5 space-y-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#5336E2]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>
                        <h2 class="text-sm font-extrabold tracking-tight text-gray-900">
                            Anggota Tim
                        </h2>
                    </div>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#EDE9FE] text-[#5B21B6]">
                        Tergabung
                    </span>
                </div>

                <ul class="flex flex-wrap gap-2.5 text-sm">
                    @foreach ($room->anggota as $a)
                        <li class="inline-flex items-center gap-2 bg-white border border-gray-200/80 px-3.5 py-2 rounded-full font-medium text-gray-800 shadow-2xs">
                            <span class="w-5 h-5 rounded-full bg-[#DCFCE7] text-[#15803D] grid place-items-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </span>
                            <span>{{ $a->user->name }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Action Section -->
            <div class="pt-4 border-t border-gray-100">
                @if ($sudahAnggota)
                    <a href="{{ route('team.show', $room) }}" class="inline-flex items-center justify-center gap-2 bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-6 py-2.5 font-semibold text-sm shadow-sm hover:shadow transition duration-200">
                        <span>Masuk Team Space</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"/>
                            <path d="m12 5 7 7-7 7"/>
                        </svg>
                    </a>
                @elseif ($sudahRequest)
                    <div class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded-full bg-[#FFEDD5] text-[#C2410C] text-sm font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                        <span>Pengajuanmu sedang diproses.</span>
                    </div>
                @else
                    <form method="POST" action="{{ route('requests.store', $room) }}" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        @csrf
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="14" x="2" y="7" rx="2" ry="2"/>
                                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                                </svg>
                            </div>
                            <select name="role_id" class="w-full pl-11 pr-9 py-2.5 bg-[#F3F4F6] border border-transparent rounded-full text-sm font-medium text-gray-900 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition appearance-none cursor-pointer">
                                @foreach ($room->roles as $role)
                                    <option value="{{ $role->id }}" @disabled($role->sisa_slot < 1)>{{ $role->nama_role }} (sisa {{ $role->sisa_slot }})</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6"/>
                                </svg>
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center justify-center gap-2 bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-6 py-2.5 font-semibold text-sm shadow-sm hover:shadow transition duration-200 cursor-pointer shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="22" y1="2" x2="11" y2="13"/>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                            </svg>
                            <span>Ajukan Diri</span>
                        </button>
                    </form>
                @endif
            </div>

        </div>

    </div>
</div>
@endsection
