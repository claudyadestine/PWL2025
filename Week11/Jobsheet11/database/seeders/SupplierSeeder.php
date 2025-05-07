<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_supplier')->insert([
            [
                'supplier_id' => 1,
                'supplier_kode' => 'SKT001',
                'supplier_nama' => 'Skintific Official',
                'supplier_alamat' => 'Jakarta',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'supplier_id' => 2,
                'supplier_kode' => 'SKT002',
                'supplier_nama' => 'Distributor A',
                'supplier_alamat' => 'Surabaya',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'supplier_id' => 3,
                'supplier_kode' => 'SKT003',
                'supplier_nama' => 'Distributor B',
                'supplier_alamat' => 'Bandung',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'supplier_id' => 20,
                'supplier_kode' => 'SKT004',
                'supplier_nama' => 'Distributor C',
                'supplier_alamat' => 'Yogyakarta',
                'created_at' => '2025-04-07 15:40:24',
                'updated_at' => null,
            ],
            [
                'supplier_id' => 21,
                'supplier_kode' => 'SKT005',
                'supplier_nama' => 'Distributor D',
                'supplier_alamat' => 'Semarang',
                'created_at' => '2025-04-07 15:40:24',
                'updated_at' => null,
            ],
            [
                'supplier_id' => 22,
                'supplier_kode' => 'SKT006',
                'supplier_nama' => 'Distributor E',
                'supplier_alamat' => 'Bali',
                'created_at' => '2025-04-07 15:40:24',
                'updated_at' => null,
            ],
        ]);
    }
}