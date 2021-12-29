<?php

namespace App\Http\Controllers;

use App\Models\Mobile\Accpesan;
use App\Models\Mobile\Lokasim;
use App\Models\Mobile\Pesanan;
use App\Models\Mobile\Customer;
use App\Models\Layanan;
use App\Models\Mobile\Mitra;
use Illuminate\Http\Request;

class AccpesanController extends Controller
{
    public function index(Request $request)
    {
        $data = Accpesan::where('pesanans_id', $request->idpesan)->first();
        // return $data;
        if ($data == null) {
            return response()->json(['success' => false]);
        } else {
            $pesanan = Pesanan::where('id', $request->idpesan)->first();
            if ($pesanan != null) {
                $layanan = Layanan::where('id', $pesanan->layanan_id)->first();
                $customer = Customer::where('id', $pesanan->customers_id)->first();
                $mitra = Mitra::where('id', $data->mitras_id)->first();
                $idlokm = $data->lokasims_id;
                $status = 'Sedang Berlangsung';
                $lat = $pesanan->latitude;
                $long = $pesanan->longitude;
                // return $pesanan;
                return response()->json(['idlokm' => $idlokm, 'mitra' => $mitra, 'latitude' => $lat, 'longitude' => $long, 'data' => $data, 'layanan' => $layanan, 'status' => $status, 'pesanan' => $pesanan, 'customer' => $customer, 'success' => true], 200);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function store(Request $request)
    {
        $idlokasi = Lokasim::where('mitras_id', $request->idmitra)->first();
        $data = Accpesan::where('pesanans_id', $request->idpesan)->first();
        if ($data == null) {
            Accpesan::create([
                'pesanans_id' => $request->idpesan,
                'mitras_id' => $request->idmitra,
                'lokasims_id' => $idlokasi->id,
            ]);
            return $this->index($request);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function update(Request $request)
    {
        Accpesan::update([
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
