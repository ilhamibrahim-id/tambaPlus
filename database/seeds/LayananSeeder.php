<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Layanan =[
            [
                'nama' => 'Isi Angin',
                'deskripsi' => 'Di isi Dengan Standard Ban , Bisa Di Isi Sesuai Keinginan Tekanan Angin',
                'harga' => 'Rp. 3.000,- / Ban'
            ],
            [
                'nama' => 'Ban Biasa',
                'deskripsi' => 'Dikerjakan dengan cepat, melakukan metode tambal ban yang praktis,melakukan tambal ban dengan baik.',
                'harga' => 'Rp.10.000,- / Lubang'
            ],
            [
                'nama' => 'Ban Tubles',
                'deskripsi' => 'Tubles Menggunakan Alat Modern, Pengerjaan Tidak Sampai 10 Menit, Menggunakan Karet Standard Tubles',
                'harga' => 'Rp.20.000,- / Lubang'
            ],
        ];
        DB::table('layanan')->insert($Layanan);
    }
}
