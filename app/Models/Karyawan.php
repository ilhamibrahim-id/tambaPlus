<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jabatan;
use App\Models\Listjob;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $fillable = [
        'nik',
        'nama',
        'foto',
        'tlpn',
        'email',
        'alamat',
        'username',
    ];

    public function jabatan(){
        return $this->belongsTo(Jabatan::class,'jabatan_id','id');
    }

    public function listjob(){
        return $this->belongsToMany(Listjob::class,'jobselesai','karyawan_id','listjob_id')->withPivot('status','bukti','id');
    }
}
