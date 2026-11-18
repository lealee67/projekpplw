<?php
namespace App\Http\Controllers;

use App\Models\{AnggotaRoom, RequestJoin, Role, Room};
use Illuminate\Http\Request;

class RequestJoinController extends Controller
{
    // Fitur 8: Notifikasi (request masuk ke project saya + status request saya)
    public function index()
    {
        $masuk = RequestJoin::with(['user.keahlian', 'room', 'role'])
            ->whereHas('room', fn ($q) => $q->where('user_id', auth()->id()))
            ->where('status', 'pending')->latest()->get();

        $keluar = RequestJoin::with(['room', 'role'])
            ->where('user_id', auth()->id())->latest()->get();

        return view('requests.index', compact('masuk', 'keluar'));
    }

    // Fitur 5: Pengajuan Kolaborasi
    public function store(Request $request, Room $room)
    {
        $data = $request->validate(['role_id' => ['required', 'exists:roles,id']]);
        $role = Role::where('id', $data['role_id'])->where('room_id', $room->id)->firstOrFail();

        if ($role->sisa_slot < 1) {
            return back()->withErrors(['role_id' => 'Slot role ini sudah penuh.']);
        }
        if (AnggotaRoom::where('room_id', $room->id)->where('user_id', auth()->id())->exists()) {
            return back()->withErrors(['role_id' => 'Kamu sudah jadi anggota project ini.']);
        }
        if ($room->requests()->where('user_id', auth()->id())->where('status', 'pending')->exists()) {
            return back()->withErrors(['role_id' => 'Pengajuanmu masih menunggu persetujuan.']);
        }

        RequestJoin::create([
            'user_id' => auth()->id(), 'room_id' => $room->id, 'role_id' => $role->id,
            'status' => 'pending', 'tanggal_request' => now(),
        ]);
        return back()->with('success', 'Pengajuan terkirim, tunggu persetujuan pemilik project.');
    }

    // Fitur 7: Persetujuan (hanya pemilik room -> middleware room.owner)
    public function approve(Room $room, RequestJoin $requestJoin)
    {
        abort_unless($requestJoin->room_id === $room->id, 404);
        $requestJoin->update(['status' => 'diterima']);
        AnggotaRoom::firstOrCreate(['user_id' => $requestJoin->user_id, 'room_id' => $room->id]);
        return back()->with('success', 'Anggota diterima.');
    }

    public function reject(Room $room, RequestJoin $requestJoin)
    {
        abort_unless($requestJoin->room_id === $room->id, 404);
        $requestJoin->update(['status' => 'ditolak']);
        return back()->with('success', 'Pengajuan ditolak.');
    }
}
