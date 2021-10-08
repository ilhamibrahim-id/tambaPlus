<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Layanan;

class DashboardController extends Controller
{
    public function blog(){
        $data = Blog::all();
        return view('blog', compact('data'));
    }

    public function layanan(){
        $data = Layanan::all();
        return view('servis', compact('data'));
    }
}
