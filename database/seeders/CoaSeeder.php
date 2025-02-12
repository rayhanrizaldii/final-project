<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coa')->insert([
            [
                'id' => (string) Str::uuid(),
                'kode' => 6310,
                'nama' => 'Bagian Laba (Rugi) Ventura Bersama',
                'kategori_coa_id' => '40c8b4e4-3d97-4514-af23-74cc996c1f72',
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'kode' => 6320,
                'nama' => 'Bagian Laba (Rugi) Entitas Asosiasi',
                'kategori_coa_id' => '40c8b4e4-3d97-4514-af23-74cc996c1f72',
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'kode' => 6330,
                'nama' => 'Beban Keuangan',
                'kategori_coa_id' => '40c8b4e4-3d97-4514-af23-74cc996c1f72',
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'kode' => 6340,
                'nama' => 'Beban Lainnya - Bersih',
                'kategori_coa_id' => '40c8b4e4-3d97-4514-af23-74cc996c1f72',
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'kode' => 6350,
                'nama' => 'Beban Pajak Final',
                'kategori_coa_id' => '40c8b4e4-3d97-4514-af23-74cc996c1f72',
                'created_at' => now(),
            ],
            // beban pajak penghasilan
            [
                'id' => (string) Str::uuid(),
                'kode' => 6400,
                'nama' => 'Pajak Penghasilan',
                'kategori_coa_id' => '40c8b4e4-3d97-4514-af23-74cc996c1f72',
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'kode' => 6410,
                'nama' => 'Beban Pajak Penghasilan tidak Final',
                'kategori_coa_id' => '40c8b4e4-3d97-4514-af23-74cc996c1f72',
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'kode' => 6420,
                'nama' => 'Manfaat (Beban) Pajak Tangguhan',
                'kategori_coa_id' => '40c8b4e4-3d97-4514-af23-74cc996c1f72',
                'created_at' => now(),
            ],
        ]);
    }
}
