<?php

namespace App\Models\Mobile;

use App\Models\Layanan;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    public $timestamps = false;
    protected $table = "pesanans";
    protected $primarykey = "id";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id', 'id');
    }
}
