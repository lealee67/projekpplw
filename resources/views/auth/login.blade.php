@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="min-h-[calc(100vh-4rem)] bg-[#FAFAFA] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 font-['Plus_Jakarta_Sans',sans-serif]">
    <div class="max-w-6xl w-full mx-auto flex justify-center">
        <div class="w-full max-w-md bg-white rounded-3xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 overflow-hidden">

            <!-- Header Banner (Warm Peach Gradient) -->
            <div class="bg-gradient-to-br from-[#FFE3D8] to-[#FFC6B3] p-8 text-center">

    <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-gray-900">
        Login
    </h1>
    <p class="text-sm text-gray-700 mt-1.5">
        Masuk untuk mulai berkolaborasi & temukan partner proyekmu
    </p>
</div>

            <!-- Form Container -->
            <div class="p-6 sm:p-8">
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email Field -->
                    <div class="space-y-1.5">
                        <label for="email" class="block text-sm font-semibold text-gray-900">
                            Email Mahasiswa
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

                    <!-- Password Field -->
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

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between pt-1">
                        <label class="inline-flex items-center gap-2.5 text-sm text-gray-600 cursor-pointer select-none">
                            <input
                                type="checkbox"
                                name="remember"
                                class="w-4 h-4 rounded-md border-gray-300 text-[#F9633B] focus:ring-[#F9633B]/30 transition cursor-pointer"
                            >
                            <span>Ingat saya</span>
                        </label>
                    </div>

                    <!-- Primary Submit Button -->
                    <div class="pt-2">
                        <button
                            type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 bg-[#F9633B] hover:bg-[#E5522B] text-white rounded-full px-5 py-3 font-semibold text-sm shadow-sm hover:shadow transition duration-200 cursor-pointer"
                        >
                            <span>Masuk</span>
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
