<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class KategoriCoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_coa')->insert([
            [
                'id' => (string) Str::uuid(),
                'nama_kategori' => 'Pendapatan',
            ],
            [
                'id' => (string) Str::uuid(),
                'nama_kategori' => 'Beban',
            ],

        ]);
    }
}
