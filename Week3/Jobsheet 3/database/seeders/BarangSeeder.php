<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Kulkas',
                'harga_beli' => 5000000,
                'harga_jual' => 7000000,
                'kategori_id' => 1,
            ],
            [
                'barang_id' => 2,
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Chopper',
                'harga_beli' => 3000000,
                'harga_jual' => 4000000,
                'kategori_id' => 1,
            ],
            [
                'barang_id' => 3,
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Jaket',
                'harga_beli' => 50000,
                'harga_jual' => 100000,
                'kategori_id' => 2,
            ],
            [
                'barang_id' => 4,
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Maskara',
                'harga_beli' => 100000,
                'harga_jual' => 200000,
                'kategori_id' => 2,
            ],
            [
                'barang_id' => 5,
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Pensil',
                'harga_beli' => 2000,
                'harga_jual' => 5000,
                'kategori_id' => 3,
            ],
            [
                'barang_id' => 6,
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Buku Tulis',
                'harga_beli' => 5000,
                'harga_jual' => 10000,
                'kategori_id' => 3,
            ],
            [
                'barang_id' => 7,
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Kerupuk',
                'harga_beli' => 1000,
                'harga_jual' => 2000,
                'kategori_id' => 4,
            ],
            [
                'barang_id' => 8,
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Nasi',
                'harga_beli' => 5000,
                'harga_jual' => 10000,
                'kategori_id' => 4,
            ],
            [
                'barang_id' => 9,
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Jepit Rambut',
                'harga_beli' => 3000,
                'harga_jual' => 5000,
                'kategori_id' => 5,
            ],
            [
                'barang_id' => 10,
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Sabun',
                'harga_beli' => 5000,
                'harga_jual' => 8000,
                'kategori_id' => 5,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}