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

    public function layananapi(){
        $data = Layanan::all();
        return response()->json(['data' => $data],200);
    }

    public function beritaapi(){
        $data = Blog::orderBy('created_at','desc');
        return response()->json(['data' => $data],200);
    }
}
