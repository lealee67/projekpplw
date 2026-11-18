<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/** Hanya pembuat room yang boleh menyetujui/menolak request */
class EnsureRoomOwner
{
    public function handle(Request $request, Closure $next)
    {
        $room = $request->route('room');
        abort_unless($room && $room->user_id === $request->user()->id, 403, 'Hanya pemilik project.');
        return $next($request);
    }
}
