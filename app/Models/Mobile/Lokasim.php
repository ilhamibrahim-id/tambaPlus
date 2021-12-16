<?php

namespace App\Models\Mobile;

use Illuminate\Database\Eloquent\Model;

class Lokasim extends Model
{
    public $timestamps = false;
    protected $primarykey="id";
    protected $guarded=['id','created_at','updated_at'];
}
