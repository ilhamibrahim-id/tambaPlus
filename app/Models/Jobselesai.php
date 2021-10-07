<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobselesai extends Model
{
    protected $table = 'jobselesai';
    protected $fillable = [
        'listjob_id',
        'karyawan_id',
        'bukti',
        'status',
    ];
}
