<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('periode')->insert([
            [
                'id' => (string) Str::uuid(),
                'tahun' => 2014,
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun' => 2015,
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun' => 2016,
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun' => 2017,
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun' => 2018,
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun' => 2019,
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun' => 2020,
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun' => 2021,
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun' => 2022,
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun' => 2023,
            ],
        ]);
    }
}
