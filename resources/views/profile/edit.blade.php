@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-6xl mx-auto py-4 sm:py-6 font-['Plus_Jakarta_Sans',sans-serif]">
    <div class="max-w-3xl mx-auto bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 overflow-hidden">

        <!-- Header Banner (Warm Peach Gradient) -->
        <div class="bg-gradient-to-br from-[#FFE3D8] to-[#FFC6B3] p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="space-y-1.5">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-white/85 text-[#C2410C]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                    </svg>
                    <span>Pengaturan Akun</span>
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">
                    Edit Profil
                </h1>
                <p class="text-sm text-gray-700">
                    Perbarui informasi diri, kampus, dan keahlianmu agar makin mudah ditemukan rekan proyek.
                </p>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-white/90 text-[#F9633B] grid place-items-center shadow-sm shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-6 sm:p-8">
            <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Identitas Dasar -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Nama Lengkap -->
                    <div class="space-y-1.5">
                        <label for="name" class="block text-sm font-semibold text-gray-900">
                            Nama Lengkap
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <input
                                id="name"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                            >
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="space-y-1.5">
                        <label for="username" class="block text-sm font-semibold text-gray-900">
                            Username
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="4"/>
                                    <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8"/>
                                </svg>
                            </div>
                            <input
                                id="username"
                                name="username"
                                value="{{ old('username', $user->username) }}"
                                class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                            >
                        </div>
                    </div>
                </div>

                <!-- No. WhatsApp -->
                <div class="space-y-1.5">
                    <label for="no_wa" class="block text-sm font-semibold text-gray-900">
                        No. WhatsApp
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <input
                            id="no_wa"
                            name="no_wa"
                            value="{{ old('no_wa', $user->no_wa) }}"
                            placeholder="No. WA"
                            class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                        >
                    </div>
                </div>

                <!-- Deskripsi / Bio -->
                <div class="space-y-1.5">
                    <label for="deskripsi" class="block text-sm font-semibold text-gray-900">
                        Bio Singkat
                    </label>
                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="3"
                        placeholder="Tentang kamu"
                        class="w-full p-4 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                    >{{ old('deskripsi', $user->deskripsi) }}</textarea>
                </div>

                <!-- Institusi & Wilayah -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Institusi -->
                    <div class="space-y-1.5">
                        <label for="institusi_id" class="block text-sm font-semibold text-gray-900">
                            Institusi / Kampus
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                    <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                                </svg>
                            </div>
                            <select
                                id="institusi_id"
                                name="institusi_id"
                                class="w-full pl-11 pr-9 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition appearance-none cursor-pointer"
                            >
                                <option value="">Pilih institusi</option>
                                @foreach ($institusi as $i)
                                    <option value="{{ $i->id }}" @selected(old('institusi_id', $user->institusi_id) == $i->id)>{{ $i->nama_institusi }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Wilayah -->
                    <div class="space-y-1.5">
                        <label for="wilayah_id" class="block text-sm font-semibold text-gray-900">
                            Domisili / Wilayah
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>
                            <select
                                id="wilayah_id"
                                name="wilayah_id"
                                class="w-full pl-11 pr-9 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition appearance-none cursor-pointer"
                            >
                                <option value="">Pilih wilayah</option>
                                @foreach ($wilayah as $w)
                                    <option value="{{ $w->id }}" @selected(old('wilayah_id', $user->wilayah_id) == $w->id)>{{ $w->nama_kabupaten_kota }}, {{ $w->nama_provinsi }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sub-box Keahlian -->
                <div class="bg-[#F3F4F6] rounded-2xl p-5 space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2 text-sm font-semibold text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#5336E2]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <span>Keahlian</span>
                        </div>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#EDE9FE] text-[#5B21B6]">
                            Pilih yang sesuai
                        </span>
                    </div>

                    <div class="flex flex-wrap gap-2.5">
                        @foreach ($keahlian as $k)
                            <label class="inline-flex items-center gap-2 px-3.5 py-2 rounded-full bg-white border border-gray-200/80 text-sm font-medium text-gray-700 hover:border-[#F9633B] transition cursor-pointer select-none shadow-2xs">
                                <input
                                    type="checkbox"
                                    name="keahlian[]"
                                    value="{{ $k->id }}"
                                    @checked($user->keahlian->contains($k->id))
                                    class="w-4 h-4 rounded text-[#F9633B] border-gray-300 focus:ring-[#F9633B]/30 cursor-pointer"
                                >
                                <span>{{ $k->nama_keahlian }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Submit Action -->
                <div class="pt-2 flex items-center justify-end">
                    <button
                        type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-6 py-2.5 font-semibold text-sm shadow-sm hover:shadow transition duration-200 cursor-pointer"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                            <polyline points="17 21 17 13 7 13 7 21"/>
                            <polyline points="7 3 7 8 15 8"/>
                        </svg>
                        <span>Simpan</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
