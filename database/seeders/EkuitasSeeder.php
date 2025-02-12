<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EkuitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi')->insert([
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '059a3130-0fc3-46e8-9ff7-52d71adfac66',
                'debit' => 0,
                'kredit' => 356084,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '2a620504-fd4b-4d42-98ac-df04042cdc19',
                'debit' => 0,
                'kredit' => 2588833,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '2d563fc7-afbb-4f5d-a31e-d3a503761d9d',
                'debit' => 0,
                'kredit' => 3117,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '307c372f-0cd9-4242-8c5f-3f260ea7ba88',
                'debit' => 0,
                'kredit' => 2041377,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '72905dad-4672-44ea-9921-903d8a1314df',
                'debit' => 0,
                'kredit' => 610405,
                'created_at' => now(),
            ],
            // ekuitas yang dapat...
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '5cec6d2b-6582-4a19-a16e-60490af6f899',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '8dbcdbec-af37-4a15-8238-335f61824097',
                'debit' => 0,
                'kredit' => 5599819,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => 'a1585ae1-9d45-4e5b-aae7-0e8cf1a795ce',
                'debit' => 0,
                'kredit' => 57888,
                'created_at' => now(),
            ],

        ]);
    }
}
