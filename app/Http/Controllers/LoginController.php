<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        $roles = explode('/', url()->current());

        if(Auth::check()) {
            if(end($roles) !== Auth::user()->roles)
                return redirect()->route('main.dashboard');
                
            return redirect()->route('main.dashboard');
        }

        return view('login.login', ['roles' => end($roles)]);
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('main.dashboard');
        }

        return back()->withErrors(['error' => 'Data Tidak Valid']);
    }
}
