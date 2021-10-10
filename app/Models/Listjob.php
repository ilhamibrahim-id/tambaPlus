<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;

class Listjob extends Model
{
    protected $table = 'listjob';
    protected $fillable = [
        'nama',
        'deskripsi',
        'file',
    ];

    public function karyawan(){
        return $this->belongsToMany(Karyawan::class,'jobselesai','listjob_id','karyawan_id')->withPivot('status','bukti','id');
    }
}
