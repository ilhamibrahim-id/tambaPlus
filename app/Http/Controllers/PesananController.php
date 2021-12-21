<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Mobile\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        $pesanan = Pesanan::with('layanan', 'customer')->where('customers_id', $request->idcustomer)->first();
        // return $pesanan;
        return response()->json(['data' => $pesanan, 'success' => true], 200);
    }

    public function terdekat(Request $request)
    {
        $latup = $request->latitude + 5;
        $latdown = $request->latitude - 5;
        $longup = $request->longitude + 5;
        $longdown = $request->longitude - 5;
        $pesanan = Pesanan::with('layanan', 'customer')
        ->where('latitude','<', $latup)
        ->where('latitude','>', $latdown)
        ->where('longitude','<', $longup)
        ->where('longitude','>', $longdown)
        ->get();
        // return $pesanan;
        return response()->json(['data' => $pesanan, 'success' => true], 200);
    }

    public function store(Request $request)
    {
        Pesanan::created([
            'layanan_id' => $request->layananid,
            'customers_id' => $request->customerid,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return response()->json(['data' => $request->all(), 'success' => true], 200);
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
