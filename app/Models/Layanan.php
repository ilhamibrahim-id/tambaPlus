<?php

namespace App\Models;

use App\Models\Mobile\Pesanan;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
    ];

    // public function pesanan()
    // {
    //     return $this->belongsTo(Pesanan::class);
    // }
}
