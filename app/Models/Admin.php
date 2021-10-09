<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table="admin";
    protected $primarykey="id";
    protected $fillable = [
        'nama',
        'username',
        'jabatan',
        'foto',
        'password',
    ];
}
