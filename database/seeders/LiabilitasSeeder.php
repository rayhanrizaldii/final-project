<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LiabilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Liabilitas Jangka Pendek
     */
    public function run(): void
    {
        DB::table('transaksi')->insert([
            //liabilitas jangka pendek
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '7e776849-bf32-425f-bdf1-8757482a2668',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //utang bank dan lembaga
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '4c7b0ac8-0064-4f2a-9983-c3e0b716fb2f',
                'debit' => 0,
                'kredit' => 5058499,
                'created_at' => now(),
            ],
            //utang usaha
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'b51eee15-42bc-4b97-b877-a998be3bdf86',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '9eda88b9-2062-4914-840b-a249a9b4470a',
                'debit' => 0,
                'kredit' => 6549803,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '1bad404a-8c55-49b4-9fba-08c65bb42ac6',
                'debit' => 0,
                'kredit' => 1744228,
                'created_at' => now(),
            ],
            //utang bruto subkonduktor
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '990fb3ff-1e01-4fc9-8230-d9da0753dc2e',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '1b868e21-c615-42b9-b0e0-6feb27a84240',
                'debit' => 0,
                'kredit' => 1122378,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '11511f66-815d-41f9-9ba5-943b7aea670c',
                'debit' => 0,
                'kredit' => 6762621,
                'created_at' => now(),
            ],
            //utang pajak
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '47a84109-c44f-4fd3-8474-547d7edcdc21',
                'debit' => 0,
                'kredit' => 346903,
                'created_at' => now(),
            ],
            //uang muka pemberi kerja
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '1f073fed-de9f-4344-b81c-86bf35f3c886',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '3403d810-9e56-49db-b475-64e55f7c645a',
                'debit' => 0,
                'kredit' => 500262,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'ea4d29c1-0c04-456f-91a1-df4fa0085aca',
                'debit' => 0,
                'kredit' => 70000,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '06700f6a-c0e6-4322-939b-e5f191824c12',
                'debit' => 0,
                'kredit' => 100000,
                'created_at' => now(),
            ],
            // pendapatan diterima di muka
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '6a8fd9e7-4a09-473c-8758-95a47832ccd7',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'c17c7dbe-9c4f-4c91-a12b-d982e49360b7',
                'debit' => 0,
                'kredit' => 70000,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'f5891c3d-7e58-4a3f-9773-4ceb69b10e09',
                'debit' => 0,
                'kredit' => 1000,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '9a1585e4-15c6-43da-bd14-a76e45df3925',
                'debit' => 0,
                'kredit' => 364,
                'created_at' => now(),
            ],
            //beban akrual
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '6117a9f2-f196-493b-8734-22d24c715aec',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '1c893999-996b-408a-b1a0-e07ace117c9e',
                'debit' => 0,
                'kredit' => 1000000,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '6f71d4f4-56cf-48e1-b680-4b9616c24c5e',
                'debit' => 0,
                'kredit' => 100000,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'e210249b-eec4-48c3-b13d-493d45ab0388',
                'debit' => 0,
                'kredit' => 20000,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'ee57e1db-13ce-4ce9-9138-fb2b4c4edfc6',
                'debit' => 0,
                'kredit' => 9000,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '5effdb30-ba96-4865-960a-422a73c25705',
                'debit' => 0,
                'kredit' => 454,
                'created_at' => now(),
            ],
            //utang retensi
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'd4ead6dd-893e-4b8f-af9a-055ca58a45be',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '244e3d85-b8ab-4d27-a9c0-10c2f5cdbde2',
                'debit' => 0,
                'kredit' => 30235,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '98a8711c-6d03-4fb3-9377-1f839495de12',
                'debit' => 0,
                'kredit' => 422533,
                'created_at' => now(),
            ],
            // utang bank dan .....
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'c71d4b77-f3ed-4de6-b59e-73e3d86fcf6f',
                'debit' => 0,
                'kredit' => 69550,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'd2de34c6-662a-4925-b18a-63515d8ddfa2',
                'debit' => 0,
                'kredit' => 499998,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '4d6260af-64a2-44d0-b01a-38b7ad1e4d90',
                'debit' => 0,
                'kredit' =>  84892,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'd156a545-8e3b-4b24-a5d6-f959b0956e41',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],

            //liabilitas jangka panjang
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '453e341d-d849-43b2-85d6-c9ea3bb673e6',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //utang retensi
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '0e2a1690-4042-4082-be16-614469ec3405',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '900ee25a-c8fa-465c-bb92-5b0d89026693',
                'debit' => 0,
                'kredit' => 3000,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '0f85d7e8-0aa1-4fea-bf1f-410afdeba9ee',
                'debit' => 0,
                'kredit' => 6058,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '37442de3-badb-48b0-aeb8-2e289b80b109',
                'debit' => 0,
                'kredit' => 491,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '9ab1c76b-4d34-47c0-a383-3f7688a2c8d9',
                'debit' => 0,
                'kredit' => 872787,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'fca98aa8-cc11-479a-b833-063fc1533794',
                'debit' => 0,
                'kredit' =>  4021031,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '93247f56-3516-45b5-8e05-568b2c301e3f',
                'debit' => 0,
                'kredit' => 194779,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'f6972027-5e50-4f59-ac59-fa40d1ab2816',
                'debit' => 0,
                'kredit' => 20605,
                'created_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '97605992-f65c-4294-9ce0-ba7886660b56',
                'debit' => 0,
                'kredit' => 54,
                'created_at' => now(),
            ],
        ]);
    }
}
