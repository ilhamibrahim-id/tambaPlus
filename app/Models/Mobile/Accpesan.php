<?php

namespace App\Models\Mobile;

use Illuminate\Database\Eloquent\Model;

class Accpesan extends Model
{
    public $timestamps = false;
    protected $primarykey="id";
    protected $guarded=['id','created_at','updated_at'];
}
