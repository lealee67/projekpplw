<?php
namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\{AnggotaRoom, Room};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    // Jelajah Proyek
    public function index(Request $request)
    {
        $rooms = Room::with(['pembuat', 'roles'])
            ->cari($request->q)
            ->latest()->paginate(6)->withQueryString();
        return view('rooms.index', compact('rooms'));
    }

    // Proyek saya (yang dibuat + yang diikuti)
    public function saya()
    {
        $rooms = auth()->user()->roomsDiikuti()->with('pembuat')->latest()->get();
        return view('rooms.saya', compact('rooms'));
    }

    public function create() { return view('rooms.create'); }

    // Fitur 4: Posting Project
    public function store(RoomRequest $request)
    {
        DB::transaction(function () use ($request) {
            $room = $request->user()->rooms()->create($request->safe()->except('roles'));
            $room->roles()->createMany($request->input('roles'));
            // pembuat otomatis jadi anggota room
            AnggotaRoom::create(['user_id' => $request->user()->id, 'room_id' => $room->id]);
        });
        return redirect()->route('rooms.index')->with('success', 'Project berhasil dipublikasikan!');
    }

    public function show(Room $room)
    {
        $room->load(['pembuat', 'roles', 'anggota.user']);
        $sudahAnggota = $room->anggota->contains('user_id', auth()->id());
        $sudahRequest = $room->requests()->where('user_id', auth()->id())->exists();
        return view('rooms.show', compact('room', 'sudahAnggota', 'sudahRequest'));
    }
}
