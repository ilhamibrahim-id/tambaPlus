<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Mobile\Accpesan;
use App\Models\Mobile\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        $pesanan = Pesanan::where('customers_id', $request->customerid)->first();
        if ($pesanan != null) {
            $layanan = Layanan::where('id', $pesanan->layanan_id)->first();
            $data = Accpesan::with('pesanan', 'mitra', 'lokasim')->where('pesanans_id', $pesanan->id)->first();
            if ($data == null) {
                $status = 'Menunggu Driver';
            } else {
                $status = 'Sedang Berlangsung';
            }
            // return $pesanan;
            return response()->json(['data' => $pesanan, 'layanan' => $layanan, 'status' => $status, 'success' => true], 200);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function semua()
    {
        $pesanan = Pesanan::get();
        return response()->json(['data' => $pesanan, 'success' => true], 200);
    }

    public function terdekat(Request $request)
    {
        $latup = $request->latitude + 5;
        $latdown = $request->latitude - 5;
        $longup = $request->longitude + 5;
        $longdown = $request->longitude - 5;
        // return $latdown;
        $pesanan = Pesanan::where('latitude', '<=', $latup)
            ->where('latitude', '>=', $latdown)
            ->where('longitude', '<=', $longup)
            ->where('longitude', '>=', $longdown)
            ->get();
        // return $pesanan;
        return response()->json(['data' => $pesanan, 'success' => true], 200);
    }

    public function store(Request $request)
    {
        Pesanan::create([
            'layanan_id' => $request->layananid,
            'customers_id' => $request->customerid,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);
        return $this->index($request);
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        Pesanan::where('id', $request->id)->delete();
        return response()->json(['success' => true], 200);
    }
}
