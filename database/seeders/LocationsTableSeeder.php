<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Provinces;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarProvince = RajaOngkir::provinsi()->all();
        foreach($daftarProvince as $province){
            Provinces::create([
                'province_id' => $province['province_id'],
                'title' => $province['province'],
            ]);
            $daftarKota = RajaOngkir::kota()->dariProvinsi($province['province_id'])->get();
            foreach($daftarKota as $kota){
                Cities::create([
                    'province_id' => $province['province_id'],
                    'cities_id' => $kota['city_id'],
                    'title' => $kota['city_name']
                ]);
            }
        }
    }
}
