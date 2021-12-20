<?php

namespace App\Http\Controllers;

use App\Models\Mobile\Accpesan;
use Illuminate\Http\Request;

class AccpesanController extends Controller
{
    public function index(Request $request)
    {
        $data = Accpesan::with('pesanan','mitra','lokasim');
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy()
    {
        //
    }
}
