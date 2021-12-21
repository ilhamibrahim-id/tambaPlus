<?php

namespace App\Http\Controllers;

use App\Models\Mobile\Accpesan;
use App\Models\Mobile\Lokasim;
use Illuminate\Http\Request;

class AccpesanController extends Controller
{
    public function index(Request $request)
    {
        $data = Accpesan::with('pesanan', 'mitra', 'lokasim')->where('pesanans_id', $request->idpesan)->first();
        return response()->json(['data' => $data, 'success' => true], 200);
    }

    public function store(Request $request)
    {
        $idlokasi = Lokasim::where('mitras_id', $request->idmitra)->first();
        Accpesan::created([
            'pesanans_id' => $request->idpesan,
            'mitras_id' => $request->idmitra,
            'lokasims_id' => $idlokasi->id,
        ]);
        return response()->json(['data' => $request->all(), 'success' => true], 200);
    }

    public function update(Request $request)
    {
        Accpesan::updated([
            'harga' => $request->harga,
            'catatan' => $request->catatan,
        ]);
        return response()->json(['data' => $request->all(), 'success' => true], 200);
    }

    public function destroy(Request $request)
    {
        Accpesan::where('id', $request->id)->delete();
        return response()->json(['success' => true], 200);
    }
}
