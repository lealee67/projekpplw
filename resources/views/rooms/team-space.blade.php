@extends('layouts.app')
<<<<<<< HEAD

@section('title', 'Team Space')

@section('content')
<div class="max-w-7xl mx-auto space-y-8 font-['Plus_Jakarta_Sans',sans-serif]">

    <!-- Hero / Header Banner (Warm Peach Gradient) -->
    <div class="bg-gradient-to-br from-[#FFE3D8] to-[#FFC6B3] rounded-3xl p-6 sm:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="space-y-2">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold bg-white/85 text-[#C2410C]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="7" height="7" x="3" y="3" rx="1"/>
                    <rect width="7" height="7" x="14" y="3" rx="1"/>
                    <rect width="7" height="7" x="14" y="14" rx="1"/>
                    <rect width="7" height="7" x="3" y="14" rx="1"/>
                </svg>
                <span>Workspace Kolaborasi</span>
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">
                {{ $room->nama_room }} — Team Space
            </h1>
            <p class="text-sm sm:text-base text-gray-700">
                Kelola tautan komunikasi tim, bagi tugas ke anggota, dan pantau progres pengerjaan proyek bersama.
            </p>
        </div>

        <div class="shrink-0 flex items-center gap-3 self-start md:self-center">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/90 text-gray-900 text-sm font-bold shadow-xs">
                <span class="w-6 h-6 rounded-full bg-[#DCFCE7] text-[#15803D] grid place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </span>
                <span>{{ $room->anggota->count() }} anggota</span>
            </span>
        </div>
    </div>

    <!-- Form 1: Link Grup Komunikasi -->
    <div class="bg-white rounded-3xl p-5 sm:p-6 border border-gray-100 shadow-sm hover:shadow-md transition duration-200">
        <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#5336E2]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
            </svg>
            <span>Channel Komunikasi Tim</span>
        </div>

        <form method="POST" action="{{ route('team.resources', $room) }}" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            @csrf
            @method('PUT')

            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                </div>
                <input
                    name="link_groupchat"
                    value="{{ old('link_groupchat', $room->link_groupchat) }}"
                    placeholder="Link grup komunikasi"
                    class="w-full pl-11 pr-4 py-2.5 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                >
            </div>

            <div class="flex items-center gap-2.5 shrink-0">
                <button
                    type="submit"
                    class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-2 bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-5 py-2.5 font-semibold text-sm shadow-sm hover:shadow transition duration-200 cursor-pointer"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                        <polyline points="17 21 17 13 7 13 7 21"/>
                        <polyline points="7 3 7 8 15 8"/>
                    </svg>
                    <span>Simpan</span>
                </button>

                @if ($room->link_groupchat)
                    <a
                        href="{{ $room->link_groupchat }}"
                        target="_blank"
                        class="inline-flex items-center justify-center gap-1.5 px-5 py-2.5 rounded-full bg-[#EDE9FE] hover:bg-[#5336E2] text-[#5B21B6] hover:text-white font-semibold text-sm transition duration-200 whitespace-nowrap"
                    >
                        <span>Buka</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                            <polyline points="15 3 21 3 21 9"/>
                            <line x1="10" y1="14" x2="21" y2="3"/>
                        </svg>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Form 2: Tambah Task Baru -->
    <div class="bg-white rounded-3xl p-5 sm:p-6 border border-gray-100 shadow-sm hover:shadow-md transition duration-200">
        <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-gray-500 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#F9633B]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 20h9"/>
                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
            </svg>
            <span>Buat Tugas Baru</span>
        </div>

        <form method="POST" action="{{ route('team.tasks.store', $room) }}" class="grid grid-cols-1 md:grid-cols-5 gap-3">
            @csrf

            <input
                name="nama_task"
                placeholder="Nama task"
                class="w-full px-4 py-2.5 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition md:col-span-2"
            >

            <div class="relative">
                <select
                    name="status_id"
                    class="w-full pl-4 pr-9 py-2.5 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm font-medium text-gray-800 focus:bg-white focus:border-[#5336E2] focus:ring-2 focus:ring-[#5336E2]/20 focus:outline-none transition appearance-none cursor-pointer"
                >
                    @foreach ($statuses as $s)
                        <option value="{{ $s->id }}">{{ $s->nama_status }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </div>
            </div>

            <div class="relative">
                <select
                    name="anggota_id"
                    class="w-full pl-4 pr-9 py-2.5 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm font-medium text-gray-800 focus:bg-white focus:border-[#5336E2] focus:ring-2 focus:ring-[#5336E2]/20 focus:outline-none transition appearance-none cursor-pointer"
                >
                    <option value="">Penanggung jawab</option>
                    @foreach ($room->anggota as $a)
                        <option value="{{ $a->id }}">{{ $a->user->name }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </div>
            </div>

            <input
                name="due_date"
                type="date"
                class="w-full px-4 py-2.5 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-800 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
            >

            <div class="md:col-span-5 pt-1 flex justify-end">
                <button
                    type="submit"
                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-6 py-2.5 font-semibold text-sm shadow-sm hover:shadow transition duration-200 cursor-pointer"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"/>
                        <line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    <span>Tambah Task</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Kanban Board Columns -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-start">
        @foreach ($statuses as $status)
            <div class="bg-[#F3F4F6] rounded-3xl p-4 sm:p-5 border border-gray-200/60 space-y-4">
                <!-- Column Header -->
                <div class="flex items-center justify-between px-1">
                    <h3 class="font-extrabold tracking-tight text-sm sm:text-base text-gray-900">
                        {{ $status->nama_status }}
                    </h3>
                    <span class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-[#EDE9FE] text-[#5B21B6]">
                        {{ $status->tasks->count() }}
                    </span>
                </div>

                <!-- Tasks List -->
                <div class="space-y-3">
                    @foreach ($status->tasks as $task)
                        <div class="bg-white rounded-2xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition duration-200 text-sm space-y-3">
                            <div class="font-bold text-gray-900 leading-snug">
                                {{ $task->nama_task }}
                            </div>

                            <!-- Assignee & Due Date Sub-box -->
                            <div class="bg-[#F3F4F6] rounded-xl px-3 py-2 space-y-1 text-xs text-gray-500">
                                <div class="flex items-center gap-1.5 truncate">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-[#5336E2] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                        <circle cx="12" cy="7" r="4"/>
                                    </svg>
                                    <span class="truncate font-medium text-gray-700">{{ $task->anggota?->user->name ?? 'Belum ditugaskan' }}</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-[#C2410C] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="18" height="18" x="3" y="4" rx="2" ry="2"/>
                                        <line x1="16" y1="2" x2="16" y2="6"/>
                                        <line x1="8" y1="2" x2="8" y2="6"/>
                                        <line x1="3" y1="10" x2="21" y2="10"/>
                                    </svg>
                                    <span>{{ tgl_indo($task->due_date) }}</span>
                                </div>
                            </div>

                            <!-- Card Footer: Move Status & Delete -->
                            <div class="pt-2 border-t border-gray-100 flex items-center justify-between gap-2">
                                <form method="POST" action="{{ route('team.tasks.update', [$room, $task]) }}" class="flex-1">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="nama_task" value="{{ $task->nama_task }}">
                                    <input type="hidden" name="anggota_id" value="{{ $task->anggota_id }}">
                                    <div class="relative">
                                        <select
                                            name="status_id"
                                            class="w-full pl-3 pr-7 py-1.5 bg-[#FFEDD5] text-[#C2410C] rounded-full text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-[#F9633B]/30 appearance-none cursor-pointer transition"
                                            onchange="this.form.submit()"
                                        >
                                            @foreach ($statuses as $s)
                                                <option value="{{ $s->id }}" @selected($s->id == $task->status_id)>{{ $s->nama_status }}</option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 pr-2.5 flex items-center pointer-events-none text-[#C2410C]">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m6 9 6 6 6-6"/>
                                            </svg>
                                        </div>
                                    </div>
                                </form>

                                <form method="POST" action="{{ route('team.tasks.destroy', [$room, $task]) }}" onsubmit="return confirm('Hapus task?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-full text-xs font-semibold text-red-600 hover:bg-red-50 transition cursor-pointer"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"/>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

=======
@section('title', 'Team Space')
@section('content')
<div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-bold">{{ $room->nama_room }} — Team Space</h1>
    <span class="text-sm text-gray-500">{{ $room->anggota->count() }} anggota</span>
</div>

<form method="POST" action="{{ route('team.resources', $room) }}" class="bg-white p-4 rounded shadow mb-5 flex gap-2">
    @csrf @method('PUT')
    <input name="link_groupchat" value="{{ old('link_groupchat', $room->link_groupchat) }}" placeholder="Link grup komunikasi" class="flex-1 border rounded p-2">
    <button class="bg-gray-900 text-white px-4 rounded">Simpan</button>
    @if ($room->link_groupchat)<a href="{{ $room->link_groupchat }}" target="_blank" class="self-center text-blue-600">Buka</a>@endif
</form>

<form method="POST" action="{{ route('team.tasks.store', $room) }}" class="bg-white p-4 rounded shadow mb-5 grid md:grid-cols-5 gap-2">
    @csrf
    <input name="nama_task" placeholder="Nama task" class="border rounded p-2 md:col-span-2">
    <select name="status_id" class="border rounded p-2">
        @foreach ($statuses as $s)<option value="{{ $s->id }}">{{ $s->nama_status }}</option>@endforeach
    </select>
    <select name="anggota_id" class="border rounded p-2">
        <option value="">Penanggung jawab</option>
        @foreach ($room->anggota as $a)<option value="{{ $a->id }}">{{ $a->user->name }}</option>@endforeach
    </select>
    <input name="due_date" type="date" class="border rounded p-2">
    <button class="bg-blue-600 text-white rounded p-2 md:col-span-5">+ Tambah Task</button>
</form>

<div class="grid md:grid-cols-4 gap-4">
@foreach ($statuses as $status)
    <div class="bg-gray-100 p-3 rounded">
        <h3 class="font-semibold mb-2">{{ $status->nama_status }} ({{ $status->tasks->count() }})</h3>
        @foreach ($status->tasks as $task)
            <div class="bg-white p-3 rounded shadow mb-2 text-sm">
                <div class="font-medium">{{ $task->nama_task }}</div>
                <div class="text-xs text-gray-500">{{ $task->anggota?->user->name ?? 'Belum ditugaskan' }} · {{ tgl_indo($task->due_date) }}</div>
                <form method="POST" action="{{ route('team.tasks.update', [$room, $task]) }}" class="mt-2 flex gap-1">
                    @csrf @method('PUT')
                    <input type="hidden" name="nama_task" value="{{ $task->nama_task }}">
                    <input type="hidden" name="anggota_id" value="{{ $task->anggota_id }}">
                    <select name="status_id" class="border rounded text-xs p-1" onchange="this.form.submit()">
                        @foreach ($statuses as $s)<option value="{{ $s->id }}" @selected($s->id == $task->status_id)>{{ $s->nama_status }}</option>@endforeach
                    </select>
                </form>
                <form method="POST" action="{{ route('team.tasks.destroy', [$room, $task]) }}" onsubmit="return confirm('Hapus task?')">
                    @csrf @method('DELETE')
                    <button class="text-xs text-red-600 mt-1">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>
@endforeach
>>>>>>> e1589bd7f2265adc53f486181f44d8f0a06c92c2
</div>
@endsection
