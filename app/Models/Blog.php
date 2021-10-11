<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = true;
    protected $table = 'blog';
    protected $fillable = [
        'judul',
        'isi',
        'gambar',
    ];
}
