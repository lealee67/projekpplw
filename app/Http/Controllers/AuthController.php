<?php
namespace App\Http\Controllers;

use App\Http\Requests\{LoginRequest, RegisterRequest};
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister() { return view('auth.register'); }
    public function showLogin()    { return view('auth.login'); }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated()); // password otomatis di-hash (cast)
        Auth::login($user);
        return redirect()->route('rooms.index')->with('success', 'Registrasi berhasil, selamat datang!');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('rooms.index'));
        }
        return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
