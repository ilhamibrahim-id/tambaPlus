<?php

namespace App\Models\Mobile;

use Illuminate\Database\Eloquent\Model;

class Accpesan extends Model
{
    public $timestamps = false;
    protected $primarykey = "id";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanans_id', 'id');
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'mitras_id', 'id');
    }

    public function lokasim()
    {
        return $this->belongsTo(Lokasim::class, 'lokasims_id', 'id');
    }
}
