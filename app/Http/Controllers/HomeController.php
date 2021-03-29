<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Couriers;
use App\Models\Provinces;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class HomeController extends Controller
{
    public function index()
    {
        $couriers = Couriers::pluck('title', 'code');
        $provinces = Provinces::pluck('title','province_id');
        return view('welcome',[
            'Couriers' => $couriers,
            'provinces' => $provinces
        ]);
    }

    public function getCities($id)
    {
        $city = Cities::where('province_id', $id)->pluck('title','cities_id');
        return json_encode($city);
    }

    public function submit(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin,     // ID kota/kabupaten asal
            'destination'   => $request->city_destination,     // ID kota/kabupaten tujuan
            'weight'        => $request->weight,   // berat barang dalam gram
            'courier'       => $request->courier,    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();
        dd($cost);
    }
}
