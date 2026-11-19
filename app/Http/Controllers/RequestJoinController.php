<?php
namespace App\Http\Controllers;

use App\Models\{AnggotaRoom, RequestJoin, Role, Room};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        //owner tidak boleh mengajukan diri sendiri join room
        if ($room->user_id === auth()->id()){
            return back()->withErrors([
                'role_id' => 'Anda adalah pemilik project ini.'
            ]);
        }

        //memastikan role berasal dari room yang dipilih
        $role = Role::where('id', $data['role_id'])->where('room_id', $room->id)->firstOrFail();

        //cek apakah user sudah menjadi member room
         if (AnggotaRoom::where('room_id', $room->id)->where('user_id', auth()->id())->exists()) {
            return back()->withErrors(['role_id' => 'Anda adalah anggota project ini.']);
        }

        //cek kapasitas(termasuk owner)
         if($room->anggota()->count() >= $room->kapasitas){
            return back()->withErrors([
                'role_id' => 'Kapasitas room sudah penuh!'
            ]);
        }

        //cek pengajuan yang masih pending
        if ($room->requests()->where('user_id', auth()->id())->where('status', 'pending')->exists()) {
            return back()->withErrors(['role_id' => 'Pengajuanmu masih menunggu persetujuan.']);
        }

        //cek slot role
         if ($role->sisa_slot < 1) {
            return back()->withErrors(['role_id' => 'Slot role ini sudah penuh.']);
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
        //memastikan request asalnya dari room yang sesuai
        abort_unless($requestJoin->room_id === $room->id, 404);

        $result = DB::transaction(function() use ($room, $requestJoin) {
            //lock data room selama 1 transaksi pengajuan berlangsung (lock kapasitas room)
            $lockedRoom = Room::where('id', $room->id)
                ->lockForUpdate()
                ->firstOrFail();

            //memastikan tidak ada transaksi lain saat satu request diproses (lock request pengajuan)
            $lockedRequest = RequestJoin::where('id', $requestJoin->id)
                ->where('room_id', $lockedRoom->id)
                ->lockForUpdate()
                ->firstOrFail();


        //memastikan pengajuan masih pending
        abort_unless($lockedRequest->status === 'pending', 403, 'Pengajuan sudah diproses.');

        $role = Role::where('id', $lockedRequest->role_id)
            ->where('room_id', $lockedRoom->id)
            ->firstOrFail();

        //cek slot role
        if ($role->sisa_slot < 1) {
            return 'role_full';
        }

        //cek kapasitas
        if($lockedRoom->anggota()->count() >= $lockedRoom->kapasitas){
            return 'room_full';
        }

        //ubah status pengajuan
        $lockedRequest->update(['status' => 'diterima']);

        //memasukkan user ke anggota room
        AnggotaRoom::firstOrCreate([
            'user_id' => $lockedRequest->user_id,
            'room_id' => $lockedRoom->id
            ]);
            return 'accepted';
        });

        if ($result === 'role_full') {
            return back()->withErrors([
                'requestJoin' => 'Slot role sudah penuh!'
            ]);
        }

        //cek kapasitas
        if($result === 'room_full'){
            return back()->withErrors([
                'requestJoin' => 'Kapasitas room sudah penuh!'
            ]);
        }

        return back()->with('success', 'Anggota berhasil diterima.');
    }

    public function reject(Room $room, RequestJoin $requestJoin)
    {
        //memastikan request berasal dari room yang sesuai (bukan nyasar request room orang lain)
        abort_unless($requestJoin->room_id === $room->id, 404);

        DB::transaction(function() use ($room, $requestJoin) {
        // lock data room selama transaksi berlangsung
        $lockedRoom = Room::where('id', $room->id)
            ->lockForUpdate()
            ->firstOrFail();

        // lock request pengajuan yang sedang diproses
        $lockedRequest = RequestJoin::where('id', $requestJoin->id)
            ->where('room_id', $lockedRoom->id)
            ->lockForUpdate()
            ->firstOrFail();

        //meamastikan pengajuan masih berstatus pending
        abort_unless($lockedRequest->status === 'pending', 403, 'Pengajuan sudah diproses.');

        //ubah status pengajuan
        $lockedRequest->update(['status' => 'ditolak']);
        });

        return back()->with('success', 'Pengajuan ditolak.');
    }
}
