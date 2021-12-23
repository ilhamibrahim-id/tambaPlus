<?php

namespace App\Http\Controllers;

use App\Models\Mobile\History;
use Illuminate\Http\Request;
use Carbon\Carbon;
class HistoryController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $date = date('Y-m-d');
        $hari = Carbon::now()->dayOfWeek;
        History::created([
            'layanan_id' => $request->idlayanan,
            'customers_id' => $request->idcustomer,
            'mitras_id' => $request->idmitra,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'harga' => $request->harga,
            'catatan' => $request->catatan,
            'tanggal'=>$date,
            'hari'=>$hari
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
    public function chartHistory()
    {
        $data = History::selectRaw("harga, created_at")->orderBy('created_at')->get();
        return view('inti.History.history', compact('data'));
    }
    
}
