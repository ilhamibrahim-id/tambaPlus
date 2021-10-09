<?php

namespace App\Http\Controllers;

use App\Http\Requests\KaryawanRequest;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Jabatan;
use App\Models\Jobselesai;
use App\Models\Karyawan;
use App\Models\Layanan;
use App\Models\Listjob;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = Karyawan::count();
        return view('inti.main.dashboard', compact('data', 'kry'));
    }

    ///////////////////////////
    // FUNGSI UNTUK KARYAWAN //
    ///////////////////////////
    public function karyawan()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = Karyawan::with('jabatan')->paginate(10);
        //return $kry;
        return view('inti.main.table', compact('data', 'kry'));
    }

    public function tambahkaryawan()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        return view('inti.main.tambah_karyawan', compact('data'));
    }

    public function storekaryawan(KaryawanRequest $request)
    {
        $user = User::where('username', '=', $request['username'])->first();
        if ($user !== null) {
            return back()->withErrors(['error' => 'Username Sudah Terpakai']);
        } else {
            $nik = Karyawan::where('nik', '=', $request['nik'])->first();
            if ($user !== null) {
                return back()->withErrors(['error' => 'Data Sudah Terdaftar']);
            } else {
                DB::table('karyawan')->insert([
                    'nik' => $request->nik,
                    'nama' => $request->nama,
                    'foto' => null,
                    'tlpn' => $request->tlpn,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    'username' => $request->username,
                ]);
                DB::table('users')->insert([
                    'username' => $request->username,
                    'password' => bcrypt($request['password']),
                    'role' => 'karyawan',
                ]);
                return redirect('admin/karyawan');
            }
        }
    }

    public function hapuskaryawan($id)
    {
        $kry = Karyawan::select('username')->where('id', $id)->first();
        DB::table('users')->where('username', $kry)->delete();
        DB::table('karyawan')->where('id', $id)->delete();
        return back();
    }

    public function editkaryawan($id)
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = Karyawan::where('id', $id)->first();;
        return view('inti.main.edit_karyawan', compact('data', 'kry'));
    }

    public function updatekaryawan(Request $request)
    {
        DB::table('karyawan')->where('id', $request->id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tlpn' => $request->tlpn,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'username' => $request->username,
        ]);
        DB::table('users')->where('username', $request->username)->update([
            'username' => $request->username,
        ]);
        return redirect('admin/karyawan');
    }

    //////////////////////////
    // FUNGSI UNTUK LISTJOB //
    //////////////////////////
    public function listjob()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $lj = Listjob::paginate(10);
        return view('inti.main.table', compact('data', 'lj'));
    }

    /////////////////////////////////////////////
    // FUNGSI UNTUK JOB / JOBSELESAI / LAPORAN //
    /////////////////////////////////////////////
    public function job()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $job = Jobselesai::paginate(10);
        return view('inti.main.table', compact('data', 'job'));
    }

    ///////////////////////
    // FUNGSI UNTUK BLOG //
    ///////////////////////
    public function blog()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $blog = Blog::paginate(10);
        return view('inti.main.table', compact('data', 'blog'));
    }

    //////////////////////////
    // FUNGSI UNTUK LAYANAN //
    //////////////////////////
    public function layanan()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $lyn = Layanan::paginate(10);
        return view('inti.main.table', compact('data', 'lyn'));
    }

    //////////////////////////
    // FUNGSI UNTUK JABATAN //
    //////////////////////////
    public function jabatan()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $jabatan = Jabatan::paginate(10);
        return view('inti.main.table', compact('data', 'jabatan'));
    }

    ////////////////////////
    // FUNGSI UNTUK ADMIN //
    ////////////////////////
    public function admin()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $admin = Admin::paginate(10);
        return view('inti.main.table', compact('data', 'admin'));
    }
}
