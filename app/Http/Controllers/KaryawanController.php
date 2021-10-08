<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Listjob;
use App\Models\Jobselesai;
use Illuminate\Database\Eloquent\Relations\Pivot;

class KaryawanController extends Controller
{
    public function karyawan()
    {
        $data = null;
        if (auth()->user()->role == 'karyawan') {
            $data = Karyawan::where('username', '=', auth()->user()->username)->first();
        }
        $job = Listjob::with('karyawan')->where('pivot');

    }
}
