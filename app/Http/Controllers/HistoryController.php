<?php

namespace App\Http\Controllers;

use App\Models\Mobile\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        History::created([
            'layanan_id' => $request->idlayanan,
            'customers_id' => $request->idcustomer,
            'mitras_id' => $request->idmitra,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'harga' => $request->harga,
            'catatan' => $request->catatan,
        ]);
    }

    public function update(Request $request, History $history)
    {
        //
    }

    public function destroy(History $history)
    {
        //
    }
}
