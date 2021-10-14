<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Layanan;

class DashboardController extends Controller
{
    public function blog(){
        $data = Blog::orderBy('created_at','desc')->paginate(3);
        return view('blog', compact('data'));
    }

    public function detailblog($id){
        $data = Blog::find($id);
        return view('blog-single', compact('data'));
    }

    public function layanan(){
        $data = Layanan::all();
        return view('servis', compact('data'));
    }
}
