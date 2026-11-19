<?php
// Didaftarkan lewat composer.json -> autoload.files

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

if (!function_exists('tgl_indo')) {
    /** Format tanggal ke bahasa Indonesia, contoh: 10 November 2026 */
    function tgl_indo($tanggal, bool $denganJam = false): string
    {
        if (!$tanggal) return '-';
        $format = $denganJam ? 'j F Y, H:i' : 'j F Y';
        return Carbon::parse($tanggal)->locale('id')->translatedFormat($format);
    }
}

if (!function_exists('inisial')) {
    /** Ambil inisial nama untuk avatar: "Allysha Zavira" -> "AZ" */
    function inisial(string $nama): string
    {
        $kata = preg_split('/\s+/', trim($nama));
        return strtoupper(substr($kata[0] ?? '', 0, 1) . substr($kata[1] ?? '', 0, 1));
    }
}

if (!function_exists('badge_status')) {
    /** Class warna Tailwind untuk status request */
    function badge_status(string $status): string
    {
        return match ($status) {
            'diterima' => 'bg-green-100 text-green-700',
            'ditolak'  => 'bg-red-100 text-red-700',
            default    => 'bg-yellow-100 text-yellow-700',
        };
    }
}

if (!function_exists('is_room_owner')) {
    function is_room_owner($room): bool
    {
        return auth()->check() && $room->user_id === auth()->id();
    }
}
