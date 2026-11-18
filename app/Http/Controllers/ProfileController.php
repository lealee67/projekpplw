<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\{Institusi, Keahlian, User, Wilayah};

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $user->load(['keahlian', 'institusi', 'wilayah']);
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        return view('profile.edit', [
            'user'      => auth()->user()->load('keahlian'),
            'keahlian'  => Keahlian::all(),
            'institusi' => Institusi::all(),
            'wilayah'   => Wilayah::all(),
        ]);
    }

    public function update(ProfileRequest $request)
    {
        $user = $request->user();
        $user->update($request->safe()->except('keahlian'));
        $user->keahlian()->sync($request->input('keahlian', []));
        return redirect()->route('profile.show', $user)->with('success', 'Profil diperbarui.');
    }
}
