<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\User;
use App\Models\Admin;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else {
            $data = Karyawan::with('jabatan')->where('username', '=', auth()->user()->username)->first();
        }
        return view('inti.main.profile', compact('data'));
    }

    public function updateprofile(Request $request)
    {
        //return $request;
        if (auth()->user()->role == 'admin') {
            if (!$request->has('gambar')) {
                DB::table('admin')->where('username', auth()->user()->username)->update([
                    'nama' => $request->nama,
                    'username' => $request->username,
                ]);
            } else {
                $file = Admin::select('foto')->where('username', auth()->user()->username)->first();
                if ($file->foto != null) {
                    unlink(storage_path('app/public/' . $file->foto));
                }
                $request->validate([
                    'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                ]);
                $imageName = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('storage'), $imageName);
                DB::table('admin')->where('username', auth()->user()->username)->update([
                    'nama' => $request->nama,
                    'username' => $request->username,
                    'foto' => $imageName,
                ]);
            }
            DB::table('users')->where('username', auth()->user()->username)->update([
                'username' => $request->username,
            ]);
        } else {
            if (!$request->has('gambar')) {
                DB::table('karyawan')->where('username', auth()->user()->username)->update([
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'tlpn' => $request->tlpn,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    'username' => $request->username,
                ]);
            } else {
                $file = Karyawan::select('foto')->where('username', auth()->user()->username)->first();
                if ($file->foto != null) {
                    unlink(storage_path('app/public/' . $file->foto));
                }
                $request->validate([
                    'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                ]);
                $imageName = time() . '.' . $request->gambar->extension();
                $request->gambar->move(public_path('storage'), $imageName);
                DB::table('karyawan')->where('username', auth()->user()->username)->update([
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'tlpn' => $request->tlpn,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    'username' => $request->username,
                    'foto' => $imageName,
                ]);
            }
            DB::table('users')->where('username', auth()->user()->username)->update([
                'username' => $request->username,
            ]);
        }
        return back();
    }

    public function password()
    {
        if (auth()->user()->role == 'admin') {
            $data = Admin::all()->where('username', '=', auth()->user()->username)->first();
        } else {
            $data = Karyawan::with('jabatan')->where('username', '=', auth()->user()->username)->first();
        }
        return view('inti.main.edit_password', compact('data'));
    }

    public function updatepassword(PasswordRequest $request)
    {
        if (Hash::check($request->old_password, Auth::user()->password, [])) {
            User::where('username', '=', auth()->user()->username)->update(['password' => bcrypt($request['password'])]);
        } else {
            return back()->withErrors(['error' => 'Password Lama Tidak Sesuai']);
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
