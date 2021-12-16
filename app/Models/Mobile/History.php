<?php

namespace App\Models\Mobile;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public $timestamps = true;
    protected $primarykey="id";
    protected $guarded=['id','created_at','updated_at'];
}
