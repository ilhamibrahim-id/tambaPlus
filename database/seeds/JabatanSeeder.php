<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan =[
            [
                'nama' => 'Ketua Divisi Marketing',
                'deskripsi' => 'Bertugas mengatur serta memikirkan tindakan marketing untuk kepentingan perusahaan',
                'gaji' => 'Rp.10.000.000'
            ],
            [
                'nama' => 'Ketua Divisi Keuangan',
                'deskripsi' => 'Bertugas mengatur serta memikirkan tindakan alur keuangan perusahaan untuk kepentingan perusahaan',
                'gaji' => 'Rp.10.000.000'
            ],
            [
                'nama' => 'Ketua Divisi Kemitraan',
                'deskripsi' => 'Bertugas mengatur serta memikirkan tindakan membangun mitra yang sehat dan kuat untuk kepentingan perusahaan',
                'gaji' => 'Rp.10.000.000'
            ],
            [
                'nama' => 'Ketua Divisi TI',
                'deskripsi' => 'Bertugas mengatur serta memikirkan tindakan pembaruan sistem yang efisien untuk kepentingan perusahaan',
                'gaji' => 'Rp.10.000.000'
            ],
            [
                'nama' => 'Anggota Divisi Marketing',
                'deskripsi' => 'Bertugas mensuport keputusan ketua divisi untuk kepentingan perusahaan',
                'gaji' => 'Rp.5.000.000'
            ],
            [
                'nama' => 'Anggota Divisi Keuangan',
                'deskripsi' => 'Bertugas mensuport keputusan ketua divisi untuk kepentingan perusahaan',
                'gaji' => 'Rp.5.000.000'
            ],
            [
                'nama' => 'Anggota Divisi Kemitraan',
                'deskripsi' => 'Bertugas mensuport keputusan ketua divisi untuk kepentingan perusahaan',
                'gaji' => 'Rp.5.000.000'
            ],
            [
                'nama' => 'Anggota Divisi TI',
                'deskripsi' => 'Bertugas mensuport keputusan ketua divisi untuk kepentingan perusahaan',
                'gaji' => 'Rp.5.000.000'
            ],
        ];

        DB::table('jabatan')->insert($jabatan);

    }
}
