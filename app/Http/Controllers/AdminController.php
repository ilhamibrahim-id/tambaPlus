<?php

namespace App\Http\Controllers;

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
        return view('inti.main.dashboard', compact('data','kry'));
    }

    public function karyawan()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $kry = Karyawan::with('jabatan')->paginate(10);
        //return $kry;
        return view('inti.main.table', compact('data','kry'));
    }

    public function listjob()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $lj = Listjob::paginate(10);
        return view('inti.main.table', compact('data','lj'));
    }

    public function job()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $job = Jobselesai::paginate(10);
        return view('inti.main.table', compact('data','job'));
    }

    public function blog()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $blog = Blog::paginate(10);
        return view('inti.main.table', compact('data','blog'));
    }

    public function layanan()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $lyn = Layanan::paginate(10);
        return view('inti.main.table', compact('data','lyn'));
    }

    public function jabatan()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $jabatan = Jabatan::paginate(10);
        return view('inti.main.table', compact('data','jabatan'));
    }

    public function admin()
    {
        $data = Admin::where('username', '=', auth()->user()->username)->first();
        $admin = Admin::paginate(10);
        return view('inti.main.table', compact('data','admin'));
    }
}
