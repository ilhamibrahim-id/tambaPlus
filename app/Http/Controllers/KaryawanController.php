<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Listjob;
use App\Models\Jobselesai;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function dashboard()
    {
        $data = Karyawan::where('username', '=', auth()->user()->username)->first();
        $job = Jobselesai::where('karyawan_id',$data->id);
        $total = $job->count();
        $belum = $job->where('status','Belum Selesai')->count();
        $selesai = $job->where('status','Selesai')->count();
        $status = Karyawan::with('listjob')->where('username', '=', auth()->user()->username)->first();
        //return $status;
        return view('inti.Karyawan.dashboard', compact('data', 'total', 'belum', 'selesai', 'status'));
    }

    ///////////////////////////
    // FUNGSI UNTUK LIST JOB //
    ///////////////////////////
    public function listjob()
    {
        $data = Karyawan::where('username', '=', auth()->user()->username)->first();
        $kry = Listjob::with('karyawan')->paginate(10);
        //return $kry;
        return view('inti.Karyawan.table', compact('data', 'kry'));
    }

    public function detaillistjob($id)
    {
        $data = Karyawan::where('username', '=', auth()->user()->username)->first();
        $lj = Listjob::find($id);
        return view('inti.Karyawan.detail_listjob', compact('data', 'lj'));
    }

    //////////////////////
    // FUNGSI UNTUK JOB //
    //////////////////////
    public function job()
    {
        $data = Karyawan::where('username', '=', auth()->user()->username)->first();
        $kry = Karyawan::with('listjob')->where('username', '=', auth()->user()->username)->first();
        //return $kry;
        return view('inti.Karyawan.table', compact('data', 'kry'));
    }

    public function detailjob($id)
    {
        $data = Karyawan::where('username', '=', auth()->user()->username)->first();
        $lj = Jobselesai::find($id);
        //return $lj;
        return view('inti.Karyawan.tambah_laporan', compact('data', 'lj'));
    }

    public function uploadjob(Request $request)
    {
        DB::table('jobselesai')->where('id',$request->id)->update([
            'bukti' => $request->file,
            'status' => 'Koreksi'
        ]);
        return redirect('karyawan/job');
    }

    //////////////////////////
    // FUNGSI UNTUK JABATAN //
    //////////////////////////
    public function jabatan()
    {
        $data = Karyawan::where('username', '=', auth()->user()->username)->first();
        $kry = Karyawan::with('jabatan')->where('username', '=', auth()->user()->username)->first();
        //return $kry;
        return view('inti.Karyawan.table', compact('data', 'kry'));
    }
}
