<?php
namespace App\Http\Middleware;

use App\Models\AnggotaRoom;
use Closure;
use Illuminate\Http\Request;

/** Hanya anggota room yang boleh masuk Team Space */
class EnsureRoomMember
{
    public function handle(Request $request, Closure $next)
    {
        $room = $request->route('room');
        $roomId = is_object($room) ? $room->id : $room;

        $anggota = AnggotaRoom::where('room_id', $roomId)
            ->where('user_id', $request->user()->id)->exists();

        abort_unless($anggota, 403, 'Kamu bukan anggota Team Space ini.');
        return $next($request);
    }
}
