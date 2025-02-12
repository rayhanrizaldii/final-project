<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Periode;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $Aset = Transaksi::select('periode.tahun', DB::raw('SUM(transaksi.debit - transaksi.kredit) as total_aset'))
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id')
            ->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
            ->join('periode', 'transaksi.tahun_id', '=', 'periode.id')
            ->where('kategori_coa.nama_kategori', 'Aset')
            ->groupBy('periode.tahun')
            ->orderBy('periode.tahun', 'asc')
            ->get();

        $AsetLancar = Transaksi::select('periode.tahun', DB::raw('SUM(transaksi.debit - transaksi.kredit) as total_aset_lancar'))
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id')
            ->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
            ->join('periode', 'transaksi.tahun_id', '=', 'periode.id')
            ->where('kategori_coa.nama_kategori', 'Aset')
            ->where('coa.kode', 'like', '11%')
            ->groupBy('periode.tahun')
            ->orderBy('periode.tahun', 'asc')
            ->get();

        $AsetLancar_NonPersediaan = Transaksi::select('periode.tahun', DB::raw('SUM(transaksi.debit - transaksi.kredit) as total_aset_lancar_non_persediaan'))
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id')
            ->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
            ->join('periode', 'transaksi.tahun_id', '=', 'periode.id')
            ->where('kategori_coa.nama_kategori', 'Aset')
            ->where('coa.kode', 'like', '11%')
            ->where('coa.kode', 'not like', '115%')
            ->groupBy('periode.tahun')
            ->orderBy('periode.tahun', 'asc')
            ->get();

        $Liabilitas = Transaksi::select('periode.tahun', DB::raw('SUM(transaksi.kredit - transaksi.debit) as total_liabilitas'))
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id')
            ->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
            ->join('periode', 'transaksi.tahun_id', '=', 'periode.id')
            ->where('kategori_coa.nama_kategori', 'Liabilitas')
            ->groupBy('periode.tahun')
            ->orderBy('periode.tahun', 'asc')
            ->get();

        $LiabilitasLancar = Transaksi::select('periode.tahun', DB::raw('SUM(transaksi.kredit - transaksi.debit) as total_liabilitas_lancar'))
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id')
            ->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
            ->join('periode', 'transaksi.tahun_id', '=', 'periode.id')
            ->where('kategori_coa.nama_kategori', 'Liabilitas')
            ->where(function ($query) {
                $query->where('coa.kode', 'like', '21%')
                    ->orWhere('coa.kode', 'like', '22%');
            })
            ->groupBy('periode.tahun')
            ->orderBy('periode.tahun', 'asc')
            ->get();

        $Ekuitas = Transaksi::select('periode.tahun', DB::raw('SUM(transaksi.kredit - transaksi.debit) as total_ekuitas'))
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id')
            ->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
            ->join('periode', 'transaksi.tahun_id', '=', 'periode.id')
            ->where('kategori_coa.nama_kategori', 'Ekuitas')
            ->groupBy('periode.tahun')
            ->get();

        $Pendapatan = Transaksi::select('periode.tahun', DB::raw('SUM(transaksi.kredit - transaksi.debit) as total_pendapatan'))
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id')
            ->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
            ->join('periode', 'transaksi.tahun_id', '=', 'periode.id')
            ->where('kategori_coa.nama_kategori', 'Pendapatan')
            ->groupBy('periode.tahun')
            ->orderBy('periode.tahun', 'asc')
            ->get();

        $Beban = Transaksi::select('periode.tahun', DB::raw('SUM(transaksi.debit - transaksi.kredit) as total_beban'))
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id')
            ->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
            ->join('periode', 'transaksi.tahun_id', '=', 'periode.id')
            ->where('kategori_coa.nama_kategori', 'Beban')
            ->groupBy('periode.tahun')
            ->orderBy('periode.tahun', 'asc')
            ->get();

        $KategoriPendapatan = Transaksi::select('periode.tahun', 'coa.nama', 'transaksi.kredit', 'transaksi.debit')
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id')
            ->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
            ->join('periode', 'transaksi.tahun_id', '=', 'periode.id')
            ->where('kategori_coa.nama_kategori', 'Pendapatan')
            ->where('coa.nama', 'not like', 'Pendapatan Usaha')
            ->where('periode.tahun', 2023)
            ->groupBy('periode.tahun', 'coa.nama', 'transaksi.kredit', 'transaksi.debit')
            ->orderBy('periode.tahun', 'asc')
            ->get();

        $tahun = $Pendapatan->sortBy('tahun')->pluck('tahun');
        $total_pendapatan = $Pendapatan->pluck('total_pendapatan');
        $total_beban = $Beban->pluck('total_beban');

        $data = [
            'tahun' => $tahun,
            'aset' => $Aset,
            'aset_lancar' => $AsetLancar,
            'aset_lancar_non_persediaan' => $AsetLancar_NonPersediaan,
            'liabilitas' => $Liabilitas,
            'liabilitas_lancar' => $LiabilitasLancar,
            'ekuitas' => $Ekuitas,
            'pendapatan' => $Pendapatan,
            'beban' => $Beban,
        ];

        $Aset = collect($data['aset'])->pluck('total_aset');
        $Aset_Lancar = collect($data['aset_lancar'])->pluck('total_aset_lancar');
        $Aset_Lancar_Non_Persediaan = collect($data['aset_lancar_non_persediaan'])->pluck('total_aset_lancar_non_persediaan');
        $Liabilitas = collect($data['liabilitas'])->pluck('total_liabilitas');
        $Liabilitas_Lancar = collect($data['liabilitas_lancar'])->pluck('total_liabilitas_lancar');
        $Pendapatan = collect($data['pendapatan'])->pluck('total_pendapatan');
        $Beban = collect($data['beban'])->pluck('total_beban');
        $Ekuitas = collect($data['ekuitas'])->pluck('total_ekuitas');

        $Rasio_Lancar = [];
        $Rasio_Sangat_Lancar = [];
        $Laba_Bersih = [];
        $ROI = [];
        $ROE = [];
        $Rasio_Utang_Terhadap_Aset = [];
        $Rasio_Utang_Terhadap_Ekuitas = [];

        foreach ($Aset_Lancar as $index => $aset_lancar) {
            $liabilitas_lancar = $Liabilitas_Lancar[$index] ?? 1;
            $Rasio_Lancar[] = $liabilitas_lancar > 0 ? ($aset_lancar / $liabilitas_lancar) * 100 : 0;
        }

        foreach ($Pendapatan as $index => $pendapatan) {
            $beban = $Beban[$index] ?? 1;
            $Laba_Bersih[] = $beban > 0 ? $pendapatan - $beban : 0;
        }

        foreach ($Aset_Lancar_Non_Persediaan as $index => $aset_lancar_non_persediaan) {
            $liabilitas_lancar = $Liabilitas_Lancar[$index] ?? 1;
            $Rasio_Sangat_Lancar[] = $liabilitas_lancar > 0 ? ($aset_lancar_non_persediaan / $liabilitas_lancar) * 100 : 0;
        }

        foreach ($Aset as $index => $aset) {
            $ROI[] = $Laba_Bersih[$index] > 0 ? ($Laba_Bersih[$index] / $aset) * 100 : 0;
        }

        foreach ($Ekuitas as $index => $ekuitas) {
            $ROE[] = $Laba_Bersih[$index] > 0 ? ($Laba_Bersih[$index] / $ekuitas) * 100 : 0;
        }

        foreach ($Liabilitas as $index => $liabilitas) {
            $aset = $Aset[$index] ?? 1;
            $Rasio_Utang_Terhadap_Aset[] = $aset > 0 ? $Liabilitas[$index] / $aset : 0;
        }

        foreach ($Liabilitas as $index => $liabilitas) {
            $ekuitas = $Ekuitas[$index] ?? 1;
            $Rasio_Utang_Terhadap_Ekuitas[] = $ekuitas > 0 ? $Liabilitas[$index] / $ekuitas : 0;
        }



        $rasio = [
            'Rasio_Lancar' => $Rasio_Lancar,
            'Rasio_Sangat_Lancar' => $Rasio_Sangat_Lancar,
            'Laba_Bersih' => $Laba_Bersih,
            'ROI' => $ROI,
            'ROE' => $ROE,
            'Rasio_Utang_Terhadap_Aset' => $Rasio_Utang_Terhadap_Aset,
            'Rasio_Utang_Terhadap_Ekuitas' => $Rasio_Utang_Terhadap_Ekuitas,
        ];

        return view('dashboard.dashboard', compact('tahun', 'total_pendapatan', 'total_beban', 'KategoriPendapatan', 'rasio'));
    }



    public function error_403()
    {
        return view('auth.error.error-403');
    }
}
