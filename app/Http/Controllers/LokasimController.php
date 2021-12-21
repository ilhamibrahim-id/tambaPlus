<?php

namespace App\Http\Controllers;

use App\Models\Mobile\Lokasim;
use Illuminate\Http\Request;

class LokasimController extends Controller
{
    public function index(Request $request)
    {
        $lokasi = Lokasim::where('id', $request->id)->first();
        return response()->json(['data' => $lokasi, 'success' => true], 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function updatelokasi(Request $request)
    {
        Lokasim::updated([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        return response()->json(['data' => $request->all(), 'success' => true], 200);
    }

    public function updatestatus(Request $request)
    {
        Lokasim::updated([
            'status' => $request->status,
        ]);
        return response()->json(['data' => $request->all(), 'success' => true], 200);
    }

    public function destroy(Request $request)
    {
        //
    }
}
