<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        $roles = explode('/login', url()->current());

        if (Auth::check()) {
            if (end($roles) !== Auth::user()->roles)
                if (auth()->user()->role == 'admin') {
                    return redirect()->route('main.dashboard');
                } else {
                    return redirect()->route('karyawan.dashboard');
                }

            if (auth()->user()->role == 'admin') {
                return redirect()->route('main.dashboard');
            } else {
                return redirect()->route('karyawan.dashboard');
            }
        }

        return view('inti.login.login', ['roles' => end($roles)]);
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->role == 'admin') {
                return redirect()->route('main.dashboard');
            } else {
                return redirect()->route('karyawan.dashboard');
            }
        }

        return back()->withErrors(['error' => 'Data Tidak Valid']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
