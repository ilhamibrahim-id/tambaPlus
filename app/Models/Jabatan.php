<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;

class Jabatan extends Model
{
    protected $table = "jabatan";
    protected $fillable = [
        'nama',
        'deskripsi',
        'gaji',
    ];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
