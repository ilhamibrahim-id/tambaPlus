<?php

namespace App\Models\Mobile;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;
    protected $table = "customers";
    protected $primarykey = "id";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // public function pesanan()
    // {
    //     return $this->belongsTo(Pesanan::class);
    // }
}
