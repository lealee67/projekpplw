<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Temu.in')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#FAFAFA] text-gray-900 font-sans antialiased selection:bg-[#FFE3D8] selection:text-[#F9633B]">
<!-- Sticky Top Navigation -->
    <nav class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-3 text-sm">

            <!-- Brand & Main Links (Desktop) -->
            <div class="flex items-center gap-6 xl:gap-8">
                <a href="{{ route('rooms.index') }}" class="inline-flex items-center gap-2.5 whitespace-nowrap shrink-0 group">
                    <span class="flex items-center justify-center w-9 h-9 rounded-xl bg-[#FF5A36] text-white font-bold text-lg shadow-sm select-none group-hover:scale-105 transition">
                        T
                    </span>
                    <span class="text-xl font-extrabold tracking-tight text-[#111827]">
                        Temu<span class="text-[#B8320A]">.in</span>
                    </span>
                </a>

                @auth
                    <div class="hidden lg:flex items-center gap-1">
                        <!-- Jelajahi Proyek -->
                        <a href="{{ route('rooms.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-full font-medium text-gray-600 hover:text-gray-900 hover:bg-[#F3F4F6] transition whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>
                            </svg>
                            <span>Jelajahi Proyek</span>
                        </a>

                        <!-- Cari Partner -->
                        <a href="{{ route('partners.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-full font-medium text-gray-600 hover:text-gray-900 hover:bg-[#F3F4F6] transition whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                            <span>Cari Partner</span>
                        </a>

                        <!-- Proyek Saya -->
                        <a href="{{ route('rooms.saya') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-full font-medium text-gray-600 hover:text-gray-900 hover:bg-[#F3F4F6] transition whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/>
                            </svg>
                            <span>Proyek Saya</span>
                        </a>

                        <!-- Notifikasi -->
                        <a href="{{ route('requests.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-full font-medium text-gray-600 hover:text-gray-900 hover:bg-[#F3F4F6] transition whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/>
                                <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>
                            </svg>
                            <span>Notifikasi</span>
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Right Actions -->
            <div class="flex items-center gap-2.5 shrink-0">
                @auth
                    <a href="{{ route('rooms.create') }}" class="inline-flex items-center gap-1.5 bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-4 sm:px-5 py-2.5 font-semibold text-xs sm:text-sm shadow-sm hover:shadow transition whitespace-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        <span>Buat Proyek</span>
                    </a>

                    <div class="h-5 w-px bg-gray-200 hidden sm:block"></div>

                    <a href="{{ route('profile.show', auth()->user()) }}" class="inline-flex items-center gap-2 p-1 xl:pr-3 rounded-full hover:bg-[#F3F4F6] transition whitespace-nowrap">
                        <span class="w-8 h-8 rounded-full bg-[#EDE9FE] text-[#5B21B6] grid place-items-center font-bold text-xs shrink-0">
                            {{ inisial(auth()->user()->name) }}
                        </span>
                        <span class="font-semibold text-gray-800 hidden xl:inline whitespace-nowrap">
                            {{ auth()->user()->name }}
                        </span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-2 rounded-full text-xs font-semibold text-red-600 hover:bg-red-50 transition whitespace-nowrap cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                <polyline points="16 17 21 12 16 7"/>
                                <line x1="21" y1="12" x2="9" y2="12"/>
                            </svg>
                            <span class="hidden sm:inline">Logout</span>
                        </button>
                    </form>
                @else
                    <div class="flex items-center gap-2">
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded-full font-semibold text-gray-700 hover:bg-[#F3F4F6] transition whitespace-nowrap">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-5 py-2.5 font-semibold shadow-sm hover:shadow transition whitespace-nowrap">
                            Daftar
                        </a>
                    </div>
                @endauth
            </div>
        </div>

        <!-- Secondary Menu Bar (Khusus Layar Split / Tablet / HP) -->
        @auth
            <div class="flex lg:hidden items-center justify-around gap-1 px-3 py-2 border-t border-gray-100 bg-gray-50/80 text-xs font-medium text-gray-600 overflow-x-auto">
                <a href="{{ route('rooms.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full hover:bg-white hover:text-gray-900 transition whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>
                    </svg>
                    <span>Jelajahi Proyek</span>
                </a>
                <a href="{{ route('partners.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full hover:bg-white hover:text-gray-900 transition whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                    <span>Cari Partner</span>
                </a>
                <a href="{{ route('rooms.saya') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full hover:bg-white hover:text-gray-900 transition whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/>
                    </svg>
                    <span>Proyek Saya</span>
                </a>
                <a href="{{ route('requests.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full hover:bg-white hover:text-gray-900 transition whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-gray-500 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/>
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/>
                    </svg>
                    <span>Notifikasi</span>
                </a>
            </div>
        @endauth
    </nav>

    <!-- Main Content Container -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-[#DCFCE7] border border-[#15803D]/15 text-[#15803D] flex items-center gap-3 text-sm font-medium shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200/70 text-red-700 text-sm shadow-sm">
                <div class="flex items-center gap-2 font-semibold mb-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-600 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="12"/>
                        <line x1="12" y1="16" x2="12.01" y2="16"/>
                    </svg>
                    <span>Terjadi kesalahan input:</span>
                </div>
                <ul class="list-disc ml-7 space-y-1 text-red-600">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
