<?php

namespace App\Http\Controllers;

use App\Models\Mobile\Accpesan;
use App\Models\Mobile\History;
use App\Models\Mobile\Pesanan;
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
        $accpesan = Accpesan::where('mitras_id', $request->id)->first();
        $pesanan = Pesanan::where('id', $accpesan->pesanans_id)->first();
        $date = date('Y-m-d');
        $hari = Carbon::now()->dayOfWeek;
        History::create([
            'layanan_id' => $pesanan->layanan_id,
            'customers_id' => $pesanan->customers_id,
            'mitras_id' => $request->id,
            'latitude' => $pesanan->latitude,
            'longitude' => $pesanan->longitude,
            'harga' => $request->harga,
            'catatan' => $request->catatan,
            'tanggal' => $date,
            'hari' => $hari
        ]);
        Accpesan::destroy($accpesan->id);
        Pesanan::destroy($pesanan->id);
        return response()->json(['success' => true], 200);
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
