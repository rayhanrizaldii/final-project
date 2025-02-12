<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unit')->insert([
            [
                'id' => (string) Str::uuid(),
                'nama_unit' => 'SMA',
            ],
            [
                'id' => (string) Str::uuid(),
                'nama_unit' => 'Universitas',
            ],
        ]);
    }
}
