<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi')->insert([
            //aset lancar
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '655e9429-1983-4561-8ba1-e44eeefff904',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //kas dan setara kas
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '85a93453-ec8a-4670-9af1-6dede6e28fe5',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // kas (cash on hand)
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'c7c047e3-3ace-495f-9aad-95fb76b04246',
                'debit' => 55009,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // kas di bank
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '2a0a9a5d-1ea7-4e6b-89bf-e4c037d0ca98',
                'debit' => 200000,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // deposito berjangka
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'a98c88c3-c8c5-4a58-8a5c-6ae8f3bb1545',
                'debit' => 3000000,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // piutang usaha
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '3dba7b8d-40b8-4275-977a-b6c2f9b78b86',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //pihak berelasi
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '084b35f6-35b3-483e-8824-899d0cdcf034',
                'debit' =>  1036746,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //pihak ketiga
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '2f3f74c1-1227-4218-a4d3-8e4f6f3d4d6d',
                'debit' =>  2867435,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //piutang retensi
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '33118036-39f3-4c13-9e22-922105bdb92f',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //pihak berelasi
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '893f6587-305e-4d49-9608-5ee93793ed12',
                'debit' => 279483,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // pihak ketiga
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '50c6e775-7060-4e42-b451-2fc71c2cbc9c',
                'debit' =>  313861,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // tagihan bruto pemberi kerja
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '57c2ca7b-ebe9-4cf9-8861-8ffcbd0d9adc',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // pihak berelasi
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '76ba2d5a-4a05-4a58-a114-0a8b4a0ef36f',
                'debit' =>  5015305,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // pihak ketiga
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'd47937e2-28bc-4445-9495-5ca6fe140abb',
                'debit' =>  10007270,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // persediaan
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'f15a75f4-9c5e-4aac-9618-dc2e350ec72d',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // persediaan jasa konstruksi
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'acd0a8eb-dc7c-44c5-8756-41b0eea2028c',
                'debit' =>  235664,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // persediaan real estat
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '89472ba0-7071-4f70-92a7-1d55d5895c78',
                'debit' =>  4542917,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //uang muka
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '097e42cf-22ba-4872-8715-48681f0a6b7d',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // sub kontraktor
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'a07df161-6c78-499d-812c-094ba09ff985',
                'debit' =>  500000,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // pemasok
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '54c839b3-1bcd-4160-a0ce-ca0de73d820f',
                'debit' => 40000,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // lain-lain
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'b2462e2b-b1d5-4621-a66a-4a15473d7386',
                'debit' =>  2744,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // biaya dibayar di muka
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '4feefda1-ae08-4cf2-80c8-312138cdd779',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // proyek
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '86294e8f-16cf-4ae5-9743-d4deb58a7ab5',
                'debit' =>  200000,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // jaminan pelaksanaan
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '09b482a4-fd13-461c-8e06-8ae014c3e359',
                'debit' => 9000,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // asuransi
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '9513fb68-455f-4f7f-963e-d72e9581e365',
                'debit' => 600,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //jaminan uang muka pemberi kerja
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '0a76b650-c502-43c1-a642-c3081bdd5c8a',
                'debit' =>  40,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // pengembangan
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'd2b9184c-f52a-4edf-ad3f-2be9b4c04d9d',
                'debit' =>  0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // sewa
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'd0b081ff-51e6-480e-b10a-4c471dbf22d3',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // pajak dibayar di muka
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '00a82cf3-6384-460f-a949-c0122431c5e3',
                'debit' =>   1840880,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //aset lancar lain lain
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '74b707dd-4544-4f20-bc2f-19b11f49bd56',
                'debit' => 168196,
                'kredit' => 0,
                'created_at' => now(),
            ],

            // aset tidak lancar
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'e7ce0bcd-8e54-48ea-84e6-9be6d7315c11',
                'debit' => 0,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // aset real estat
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '19e3dc45-db41-438e-bedb-7f219974d2ae',
                'debit' =>  1863456,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // Aset Keuangan dari Kontrak Konsesi - Bersih
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'a44dbe9e-4807-4433-9d23-f78b1210a417',
                'debit' => 137619,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //Investasi pada Entitas Asosiasi
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '24f78e07-4aa3-4a43-90ea-7726ddb8f5b2',
                'debit' => 21710,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //Investasi pada Ventura Bersama
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '268cb311-3d79-4dff-8e48-ae72dd03e4ec',
                'debit' => 832293,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // Properti Investasi
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'be2cef38-4ca5-423c-82ef-b96e20b6c8b8',
                'debit' => 1018362,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // Aset Tetap - Bersih
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '07f72e6a-54d8-4877-ab5f-44c6b44bb396',
                'debit' => 1836865,
                'kredit' => 0,
                'created_at' => now(),
            ],
            //Aset Hak Guna - Bersih
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '4ac35dd5-ca39-4744-9626-9de212c137dd',
                'debit' => 90838,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // Investasi Jangka Panjang Lainnya
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'f599570c-444d-4eaa-adcd-5dc8026b14e4',
                'debit' => 308505,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // Aset Pajak Tangguhan
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => 'd781af01-ce16-4332-94f3-99fb50f211d7',
                'debit' => 2529,
                'kredit' => 0,
                'created_at' => now(),
            ],
            // Aset Tidak Lancar Lainnya
            [
                'id' => (string) Str::uuid(),
                'tahun_id' => 'd3803456-64a6-48d0-b762-2b432984e0de',
                'coa_id' => '0d39ac33-a22a-427a-84a8-95d5ede350e8',
                'debit' => 88496,
                'kredit' => 0,
                'created_at' => now(),
            ],
        ]);
    }
}
