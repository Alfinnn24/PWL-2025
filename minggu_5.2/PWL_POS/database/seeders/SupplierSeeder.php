<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_supplier')->insert([
            [
                'supplier_kode' => 'SUP001',
                'supplier_nama' => 'PT Sumber Rejeki',
                'supplier_alamat' => 'Jl. Sudirman No. 10, Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_kode' => 'SUP002',
                'supplier_nama' => 'CV Jaya Agung',
                'supplier_alamat' => 'Jl. Suroyo No. 9, Bogor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_kode' => 'SUP003',
                'supplier_nama' => 'UD Tambak Sari',
                'supplier_alamat' => 'Jl. Laut No. 6, Probolinggo',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}