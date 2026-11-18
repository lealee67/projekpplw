<?php
namespace App\Http\Controllers;

use App\Models\{Keahlian, User};
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    // Fitur 3: Pencarian Partner berdasarkan keahlian / nama
    public function index(Request $request)
    {
        $partners = User::with(['keahlian', 'institusi'])
            ->where('id', '!=', auth()->id())
            ->when($request->keahlian, fn ($q, $id) =>
                $q->whereHas('keahlian', fn ($k) => $k->where('keahlian.id', $id)))
            ->when($request->q, fn ($q, $kata) =>
                $q->where(fn ($w) => $w->where('name', 'like', "%$kata%")
                                       ->orWhere('username', 'like', "%$kata%")))
            ->latest()->paginate(8)->withQueryString();

        return view('partners.index', [
            'partners' => $partners,
            'keahlian' => Keahlian::all(),
        ]);
    }
}
