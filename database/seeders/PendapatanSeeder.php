<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PendapatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi')->insert([
            //pendapatan usaha
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => 'c75f20c5-8a79-45a4-94ff-d76351d76ec6',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //engineering dan konstruksi
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => 'd194cf16-03a7-40b6-b536-928a30f49144',
                'debit' => 0,
                'kredit' => 8366769,
                'created_at' => now(),
            ],
            //properti dan hospitality
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '630ef30f-1ac3-4561-990c-37462c630cc2',
                'debit' => 0,
                'kredit' => 895693,
                'created_at' => now(),
            ],
            //manufaktur
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '7d22477b-cdb4-47a6-9851-29d7e6a4faf0',
                'debit' => 0,
                'kredit' => 789284,
                'created_at' => now(),
            ],
            //investasi dan konsesi
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '80e2cb0f-debd-44da-ab80-3bb648828ba2',
                'debit' => 0,
                'kredit' => 478724,
                'created_at' => now(),
            ],

            //beban pokok pendapatan
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => 'de9edac1-0c72-47d1-bf1a-6279960941f3',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // bahan baku
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '0967494c-b5ef-47e2-be66-db0e6ba3bd73',
                'debit' => 3077669,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //tenaga kerja
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => 'd4d16c9f-0578-4af8-9924-7beeea921a7d',
                'debit' => 941704,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //subkontraktor
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '6a36e731-b758-4c94-bc43-a08c3ef98998',
                'debit' => 3682914,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //beban alat
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '1b00746b-9fed-4fa7-9067-f5b636eae28d',
                'debit' => 352943,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //overhead
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '2951c99d-4289-496b-8bfe-8d8aa5490ff9',
                'debit' => 1718814,
                'kredit' => 0,
                'created_at' => now(),
            ],

            //Beban Usaha
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '6bf9dfa8-5659-4475-a150-49800d573f08',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //Beban Penjualan
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '2c67db26-479c-4dce-bcee-fba5dd1620e4',
                'debit' => 11989,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //Beban umum dan admin
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '973fdcfa-3662-4943-92a2-0c13959831e7',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //pegawai
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => 'b87dc1c6-c696-468d-9a7e-6ee2c0bef849',
                'debit' => 396881,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //umum
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => 'c13ccaa6-539f-4093-bae8-8653f8c82832',
                'debit' => 156368,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //penyusutan
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '3ccbf90f-ca9c-41af-8ba2-df183860fc4a',
                'debit' => 70125,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //laba rugi ventura
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => 'abb98155-a08a-48c6-8d8e-01605cedcd9f',
                'debit' => 0,
                'kredit' => 361818,
                'created_at' => now(),
            ],
            //laba rugi entitas
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => 'cc31cbbd-1460-45b6-a7bc-7b865ffca324',
                'debit' => 6289,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //beban keuangan
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => 'c228defa-0a01-4bf2-b7aa-8344ea68cd96',
                'debit' => 864488,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //beban lainnya - bersih
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '643dd75b-c8a8-4d30-9860-8c3cffde3c6e',
                'debit' => 169021,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //beban pajak final
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '4d386607-85ee-4afa-a1f6-f4b5172e2669',
                'debit' => 343846,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //pajak penghasilan
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => 'd13d0939-1747-4a60-8f75-b101211a5091',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //beban pajak penghasilan tidak final
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '1f2371a0-23a6-4272-ab75-06fa85d24551',
                'debit' => 13824,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //manfaat beban pajak tangguhan
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => '43262785-3d12-4975-8512-1eb5286b257a',
                'coa_id' => '65b84da9-9013-4699-a277-deed62e0800b',
                'debit' => 0,
                'kredit' => 1091,
                'created_at' => now(),
            ],
        ]);
    }
}
