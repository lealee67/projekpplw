@extends('layouts.app')
<<<<<<< HEAD

@section('title', 'Publikasi Proyek')

@section('content')
<div class="max-w-6xl mx-auto py-4 sm:py-6 font-['Plus_Jakarta_Sans',sans-serif]">
    <div class="max-w-3xl mx-auto bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 overflow-hidden">

        <!-- Header Banner (Warm Peach Gradient) -->
        <div class="bg-gradient-to-br from-[#FFE3D8] to-[#FFC6B3] p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="space-y-1.5">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-white/85 text-[#C2410C]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/>
                        <path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/>
                        <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/>
                        <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>
                    </svg>
                    <span>Inisiasi Tim Baru</span>
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">
                    Publikasikan Proyek & Bentuk Tim
                </h1>
                <p class="text-sm text-gray-700">
                    Bagikan ide proyekmu, tentukan kapasitas anggota, dan rekrut talenta mahasiswa sesuai role yang dibutuhkan.
                </p>
            </div>

            <div class="w-14 h-14 rounded-2xl bg-white/90 text-[#F9633B] grid place-items-center shadow-sm shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                    <line x1="12" y1="11" x2="12" y2="17"/>
                    <line x1="9" y1="14" x2="15" y2="14"/>
                </svg>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-6 sm:p-8">
            <form method="POST" action="{{ route('rooms.store') }}" class="space-y-6">
                @csrf

                <!-- Nama Proyek -->
                <div class="space-y-1.5">
                    <label for="nama_room" class="block text-sm font-semibold text-gray-900">
                        Nama Proyek
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"/>
                                <polyline points="2 17 12 22 22 17"/>
                                <polyline points="2 12 12 17 22 12"/>
                            </svg>
                        </div>
                        <input
                            id="nama_room"
                            name="nama_room"
                            value="{{ old('nama_room') }}"
                            placeholder="Nama proyek"
                            class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                        >
                    </div>
                </div>

                <!-- Deskripsi Proyek -->
                <div class="space-y-1.5">
                    <label for="deskripsi" class="block text-sm font-semibold text-gray-900">
                        Deskripsi & Latar Belakang
                    </label>
                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="4"
                        placeholder="Problem statement & solusi (min. 20 karakter)"
                        class="w-full p-4 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                    >{{ old('deskripsi') }}</textarea>
                </div>

                <!-- Detail Proyek Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Kapasitas Tim -->
                    <div class="space-y-1.5">
                        <label for="kapasitas" class="block text-sm font-semibold text-gray-900">
                            Kapasitas Tim
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                            </div>
                            <input
                                id="kapasitas"
                                name="kapasitas"
                                type="number"
                                min="1"
                                oninput="if(this.value !== '' && Number(this.value) < 1) this.value = 1;"
                                value="{{ old('kapasitas', 5) }}"
                                placeholder="Kapasitas tim"
                                class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                            >
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label for="lokasi" class="block text-sm font-semibold text-gray-900">
                                Lokasi
                            </label>
                            <span class="px-2 py-0.5 rounded-full text-[11px] font-medium bg-gray-100 text-gray-600">
                                Opsional
                            </span>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>
                            <input
                                id="lokasi"
                                name="lokasi"
                                value="{{ old('lokasi') }}"
                                placeholder="Lokasi (opsional)"
                                class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                            >
                        </div>
                    </div>

                    <!-- No. WhatsApp -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <label for="no_wa" class="block text-sm font-semibold text-gray-900">
                                No. WhatsApp
                            </label>
                            <span class="px-2 py-0.5 rounded-full text-[11px] font-medium bg-gray-100 text-gray-600">
                                Opsional
                            </span>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                </svg>
                            </div>
                            <input
                                id="no_wa"
                                name="no_wa"
                                value="{{ old('no_wa') }}"
                                placeholder="No. WA (opsional)"
                                class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                            >
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="space-y-1.5">
                        <label for="tags" class="block text-sm font-semibold text-gray-900">
                            Tags / Kategori
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z"/>
                                    <path d="M7 7h.01"/>
                                </svg>
                            </div>
                            <input
                                id="tags"
                                name="tags"
                                value="{{ old('tags') }}"
                                placeholder="Tags"
                                class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                            >
                        </div>
                    </div>
                </div>

                <!-- Link Group Chat -->
                <div class="space-y-1.5">
                    <div class="flex items-center justify-between">
                        <label for="link_groupchat" class="block text-sm font-semibold text-gray-900">
                            Link Grup Chat
                        </label>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-medium bg-gray-100 text-gray-600">
                            Opsional
                        </span>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                                <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                            </svg>
                        </div>
                        <input
                            id="link_groupchat"
                            name="link_groupchat"
                            value="{{ old('link_groupchat') }}"
                            placeholder="Link grup chat (opsional)"
                            class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                        >
                    </div>
                </div>

                <!-- Sub-box: Role yang Dibutuhkan -->
<div class="bg-[#F3F4F6] rounded-2xl p-5 space-y-4">
    <div class="flex flex-wrap items-center justify-between gap-2">
        <div class="flex items-center gap-2">
            <span class="w-7 h-7 rounded-xl bg-[#EDE9FE] text-[#5B21B6] grid place-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="14" x="2" y="7" rx="2" ry="2"/>
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                </svg>
            </span>
            <h2 class="text-sm font-extrabold tracking-tight text-gray-900">
                Role yang dibutuhkan
            </h2>
        </div>
    </div>

    @php
        $oldRoles = old('roles', [['nama_role' => '', 'jumlah_dibutuhkan' => 1]]);
    @endphp

    <!-- Container Daftar Role -->
    <div id="roles-container" class="space-y-3">
        @foreach ($oldRoles as $i => $role)
            <div class="role-item flex items-center gap-2.5">
                <div class="flex-1 grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                    <input
                        name="roles[{{ $i }}][nama_role]"
                        value="{{ $role['nama_role'] ?? '' }}"
                        placeholder="Contoh: UI/UX Designer"
                        class="sm:col-span-2 w-full px-4 py-2.5 bg-white border border-gray-200/80 rounded-2xl text-sm text-gray-900 placeholder-gray-400 focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                    >
                    <input
                        name="roles[{{ $i }}][jumlah_dibutuhkan]"
                        type="number"
                        min="1"
                        oninput="if(this.value !== '' && Number(this.value) < 1) this.value = 1;"
                        value="{{ $role['jumlah_dibutuhkan'] ?? 1 }}"
                        class="w-full px-4 py-2.5 bg-white border border-gray-200/80 rounded-2xl text-sm text-gray-900 text-center font-semibold focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                    >
                </div>

                @if ($i > 0)
                    <button
                        type="button"
                        onclick="removeRoleRow(this)"
                        title="Hapus role"
                        class="p-2.5 rounded-2xl bg-white border border-gray-200/80 text-gray-400 hover:text-red-600 hover:border-red-200 hover:bg-red-50 transition shrink-0 cursor-pointer"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6h18"/>
                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                        </svg>
                    </button>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Tombol Tambah Role -->
    <button
        type="button"
        onclick="addRoleRow()"
        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-xs font-semibold bg-white text-[#F9633B] border border-[#F9633B]/30 hover:bg-[#FFE3D8]/40 transition cursor-pointer"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"/>
            <line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        <span>Tambah Role</span>
    </button>
</div>

<script>
    let roleIndex = {{ count($oldRoles) }};

    function addRoleRow() {
        const container = document.getElementById('roles-container');
        const row = document.createElement('div');
        row.className = 'role-item flex items-center gap-2.5';

        row.innerHTML = `
            <div class="flex-1 grid grid-cols-1 sm:grid-cols-3 gap-2.5">
                <input
                    name="roles[${roleIndex}][nama_role]"
                    placeholder="Contoh: Frontend Developer"
                    class="sm:col-span-2 w-full px-4 py-2.5 bg-white border border-gray-200/80 rounded-2xl text-sm text-gray-900 placeholder-gray-400 focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                >
                <input
                    name="roles[${roleIndex}][jumlah_dibutuhkan]"
                    type="number"
                    min="1"
                    oninput="if(this.value !== '' && Number(this.value) < 1) this.value = 1;"
                    value="1"
                    class="w-full px-4 py-2.5 bg-white border border-gray-200/80 rounded-2xl text-sm text-gray-900 text-center font-semibold focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                >
            </div>
            <button
                type="button"
                onclick="removeRoleRow(this)"
                title="Hapus role"
                class="p-2.5 rounded-2xl bg-white border border-gray-200/80 text-gray-400 hover:text-red-600 hover:border-red-200 hover:bg-red-50 transition shrink-0 cursor-pointer"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 6h18"/>
                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                </svg>
            </button>
        `;

        container.appendChild(row);
        roleIndex++;
    }

    function removeRoleRow(button) {
        const container = document.getElementById('roles-container');
        if (container.querySelectorAll('.role-item').length > 1) {
            button.closest('.role-item').remove();
        }
    }
</script>

                <!-- Primary Submit Button -->
                <div class="pt-2 flex items-center justify-end">
                    <button
                        type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-6 py-2.5 font-semibold text-sm shadow-sm hover:shadow transition duration-200 cursor-pointer"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"/>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                        </svg>
                        <span>Publikasikan</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
=======
@section('title', 'Publikasi Proyek')
@section('content')
<form method="POST" action="{{ route('rooms.store') }}" class="max-w-2xl mx-auto bg-white p-6 rounded shadow space-y-3">
    @csrf
    <h1 class="text-xl font-bold">Publikasikan Proyek & Bentuk Tim</h1>
    <input name="nama_room" value="{{ old('nama_room') }}" placeholder="Nama proyek" class="w-full border rounded p-2">
    <textarea name="deskripsi" rows="4" placeholder="Problem statement & solusi (min. 20 karakter)" class="w-full border rounded p-2">{{ old('deskripsi') }}</textarea>
    <div class="grid grid-cols-2 gap-3">
        <input name="kapasitas" type="number" value="{{ old('kapasitas', 5) }}" placeholder="Kapasitas tim" class="border rounded p-2">
        <input name="lokasi" value="{{ old('lokasi') }}" placeholder="Lokasi (opsional)" class="border rounded p-2">
        <input name="no_wa" value="{{ old('no_wa') }}" placeholder="No. WA (opsional)" class="border rounded p-2">
        <input name="tags" value="{{ old('tags') }}" placeholder="Tags" class="border rounded p-2">
    </div>
    <input name="link_groupchat" value="{{ old('link_groupchat') }}" placeholder="Link grup chat (opsional)" class="w-full border rounded p-2">

    <h2 class="font-semibold pt-2">Role yang dibutuhkan</h2>
    @for ($i = 0; $i < 3; $i++)
    <div class="grid grid-cols-3 gap-3">
        <input name="roles[{{ $i }}][nama_role]" value="{{ old("roles.$i.nama_role") }}" placeholder="Contoh: UI/UX Designer" class="col-span-2 border rounded p-2">
        <input name="roles[{{ $i }}][jumlah_dibutuhkan]" type="number" value="{{ old("roles.$i.jumlah_dibutuhkan", 1) }}" class="border rounded p-2">
    </div>
    @endfor
    <button class="bg-blue-600 text-white rounded px-4 py-2">Publikasikan</button>
</form>
>>>>>>> e1589bd7f2265adc53f486181f44d8f0a06c92c2
@endsection
