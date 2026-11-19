@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
<div class="min-h-[calc(100vh-4rem)] bg-[#FAFAFA] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 font-['Plus_Jakarta_Sans',sans-serif]">
    <div class="max-w-6xl w-full mx-auto flex justify-center">
        <div class="w-full max-w-lg bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 overflow-hidden">

            <!-- Header Banner (Warm Peach Gradient) -->
            <div class="bg-gradient-to-br from-[#FFE3D8] to-[#FFC6B3] p-8 text-center">

    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">
        Daftar Akun
    </h1>
    <p class="text-sm text-gray-700 mt-1.5">
        Daftar untuk mulai berkolaborasi & temukan partner proyekmu
    </p>
</div>

            <!-- Form Container -->
            <div class="p-6 sm:p-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="space-y-1.5">
                        <label for="name" class="block text-sm font-semibold text-gray-900">
                            Nama Lengkap
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                            </div>
                            <input
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Nama lengkap"
                                class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                            >
                        </div>
                    </div>

                    <!-- Username & No WA Grid on Desktop -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Username -->
                        <div class="space-y-1.5">
                            <label for="username" class="block text-sm font-semibold text-gray-900">
                                Username
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="4"/>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8"/>
                                    </svg>
                                </div>
                                <input
                                    id="username"
                                    name="username"
                                    value="{{ old('username') }}"
                                    placeholder="Username"
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                    </svg>
                                </div>
                                <input
                                    id="no_wa"
                                    name="no_wa"
                                    value="{{ old('no_wa') }}"
                                    placeholder="No. WhatsApp (opsional)"
                                    class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="space-y-1.5">
                        <label for="email" class="block text-sm font-semibold text-gray-900">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="16" x="2" y="4" rx="2"/>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                                </svg>
                            </div>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                placeholder="Email"
                                class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                            >
                        </div>
                    </div>

                    <!-- Password & Confirmation Grid on Desktop -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Password -->
                        <div class="space-y-1.5">
                            <label for="password" class="block text-sm font-semibold text-gray-900">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                    </svg>
                                </div>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="Password"
                                    class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                                >
                            </div>
                        </div>

                        <!-- Password Confirmation -->
                        <div class="space-y-1.5">
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-900">
                                Konfirmasi Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/>
                                        <path d="m9 12 2 2 4-4"/>
                                    </svg>
                                </div>
                                <input
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    type="password"
                                    placeholder="Ulangi password"
                                    class="w-full pl-11 pr-4 py-3 bg-[#F3F4F6] border border-transparent rounded-2xl text-sm text-gray-900 placeholder-gray-500 focus:bg-white focus:border-[#F9633B] focus:ring-2 focus:ring-[#F9633B]/20 focus:outline-none transition"
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Primary Submit Button -->
                    <div class="pt-3">
                        <button
                            type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-5 py-3 font-semibold text-sm shadow-sm hover:shadow transition duration-200 cursor-pointer"
                        >
                            <span>Daftar</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"/>
                                <path d="m12 5 7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
