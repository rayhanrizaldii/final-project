<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use App\Helpers\HWES;




class RatioController extends Controller
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
            ->orderBy('periode.tahun', 'asc')

            ->get();

        $Pendapatan = Transaksi::select('periode.tahun', DB::raw('SUM(transaksi.kredit - transaksi.debit) as total_pendapatan'))
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id')
            ->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
            ->join('periode', 'transaksi.tahun_id', '=', 'periode.id')
            ->where('kategori_coa.nama_kategori', 'Pendapatan')
            ->groupBy('periode.tahun')
            ->orderBy('periode.tahun', 'asc')

            ->get();

        $Persediaan = Transaksi::select('periode.tahun', DB::raw('SUM(transaksi.debit - transaksi.kredit) as total_persediaan'))
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id')
            ->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
            ->join('periode', 'transaksi.tahun_id', '=', 'periode.id')
            ->where('kategori_coa.nama_kategori', 'Aset')
            ->where('coa.kode', 'like', '115%')
            // ->where('coa.kode', 'not like', '115%')
            ->groupBy('periode.tahun')
            ->orderBy('periode.tahun', 'asc')

            ->get();

        $Modal_Kerja = Transaksi::select('periode.tahun', DB::raw('SUM(transaksi.debit - transaksi.kredit) as total_modal_kerja'))
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id')
            ->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
            ->join('periode', 'transaksi.tahun_id', '=', 'periode.id')
            ->whereIn('kategori_coa.nama_kategori', ['Aset', 'Liabilitas'])
            ->where(function ($query) {
                $query->where('coa.kode', 'like', '11%')
                    ->orWhere('coa.kode', 'like', '21%')
                    ->orWhere('coa.kode', 'like', '22%');
            })
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


        $tahun = $Aset->pluck('tahun');
        $data = [
            'tahun' => $tahun,
            'aset' => $Aset,
            'aset_lancar' => $AsetLancar,
            'aset_lancar_non_persediaan' => $AsetLancar_NonPersediaan,
            'liabilitas' => $Liabilitas,
            'liabilitas_lancar' => $LiabilitasLancar,
            'ekuitas' => $Ekuitas,
            'pendapatan' => $Pendapatan,
            'persediaan' => $Persediaan,
            'modal_kerja' => $Modal_Kerja,
            'beban' => $Beban,
        ];

        $Aset = collect($data['aset'])->pluck('total_aset');
        $Aset_Lancar = collect($data['aset_lancar'])->pluck('total_aset_lancar');
        $Aset_Lancar_Non_Persediaan = collect($data['aset_lancar_non_persediaan'])->pluck('total_aset_lancar_non_persediaan');
        $Liabilitas = collect($data['liabilitas'])->pluck('total_liabilitas');
        $Liabilitas_Lancar = collect($data['liabilitas_lancar'])->pluck('total_liabilitas_lancar');
        $Pendapatan = collect($data['pendapatan'])->pluck('total_pendapatan');
        $Persediaan = collect($data['persediaan'])->pluck('total_persediaan');
        $Modal_Kerja = collect($data['modal_kerja'])->pluck('total_modal_kerja');
        $Beban = collect($data['beban'])->pluck('total_beban');
        $Ekuitas = collect($data['ekuitas'])->pluck('total_ekuitas');

        $Rasio_Lancar = [];
        $Rasio_Sangat_Lancar = [];
        $Laba_Bersih = [];
        $ROI = [];
        $ROE = [];
        $Rasio_Utang_Terhadap_Aset = [];
        $Rasio_Utang_Terhadap_Ekuitas = [];
        $Rasio_Perputaran_Persediaan = [];
        $Rasio_Perputaran_Modal_Kerja = [];

        foreach ($Aset_Lancar as $index => $aset_lancar) {
            $liabilitas_lancar = $Liabilitas_Lancar[$index] ?? 1;
            $Rasio_Lancar[] = $liabilitas_lancar > 0 ? ($aset_lancar / $liabilitas_lancar) * 100 : 0;
        }

        foreach ($Aset_Lancar_Non_Persediaan as $index => $aset_lancar_non_persediaan) {
            $liabilitas_lancar = $Liabilitas_Lancar[$index] ?? 1;
            $Rasio_Sangat_Lancar[] = $liabilitas_lancar > 0 ? ($aset_lancar_non_persediaan / $liabilitas_lancar) * 100 : 0;
        }

        foreach ($Pendapatan as $index => $pendapatan) {
            $beban = $Beban[$index] ?? 1;
            $Laba_Bersih[] = $beban > 0 ? $pendapatan - $beban : 0;
        }
        foreach ($Aset as $index => $aset) {
            $ROI[] = $Laba_Bersih[$index] > 0 ? ($Laba_Bersih[$index] / $aset) * 100 : 0;
        }

        foreach ($Ekuitas as $index => $ekuitas) {
            $ROE[] = $Laba_Bersih[$index] > 0 ? ($Laba_Bersih[$index] / $ekuitas) * 100 : 0;
        }

        foreach ($Liabilitas as $index => $liabilitas) {
            $aset = $Aset[$index] ?? 1;
            $Rasio_Utang_Terhadap_Aset[] = $aset > 0 ? $Liabilitas[$index] / $aset * 100 : 0;
        }

        foreach ($Liabilitas as $index => $liabilitas) {
            $ekuitas = $Ekuitas[$index] ?? 1;
            $Rasio_Utang_Terhadap_Ekuitas[] = $ekuitas > 0 ? $Liabilitas[$index] / $ekuitas * 100 : 0;
        }

        foreach ($Pendapatan as $index => $pendapatan) {
            $persediaan = $Persediaan[$index] ?? 1;
            $Rasio_Perputaran_Persediaan[] = $persediaan > 0 ? $pendapatan / $persediaan : 0;
        }

        foreach ($Pendapatan as $index => $pendapatan) {
            $modal_kerja = $Modal_Kerja[$index] ?? 1;
            $Rasio_Perputaran_Modal_Kerja[] = $modal_kerja > 0 ? $pendapatan / $modal_kerja : 0;
        }



        $rasio = [
            'Rasio_Lancar' => $Rasio_Lancar,
            'Rasio_Sangat_Lancar' => $Rasio_Sangat_Lancar,
            'Laba_Bersih' => $Laba_Bersih,
            'ROI' => $ROI,
            'ROE' => $ROE,
            'Rasio_Utang_Terhadap_Aset' => $Rasio_Utang_Terhadap_Aset,
            'Rasio_Utang_Terhadap_Ekuitas' => $Rasio_Utang_Terhadap_Ekuitas,
            'Rasio_Perputaran_Persediaan' => $Rasio_Perputaran_Persediaan,
            'Rasio_Perputaran_Modal_Kerja' => $Rasio_Perputaran_Modal_Kerja,
        ];

        return view('ratio.index', compact('tahun', 'rasio', 'data'));
    }

    public function calculateHWES(Request $request)
    {

        $selectedRatio = $request->input('selectedRatio');
        $formattedRatio = str_replace('_', ' ', $selectedRatio);
        $dataAwal = $request->input('ratioData');
        $data = array_slice($dataAwal, -10);
        $seasonLength = 5;
        $alpha = 0.3;
        $beta = 0.3;
        $gamma = 0.3;

        $limaDataAwal = array_slice($data, 0, 5);
        $limaDataAkhir = array_slice($data, 5, 5);
        $totalTrendAwal = 0;
        $season = [];
        $level = [];
        $trend = [];
        $forecast = [];
        $n = count($data);
        $dataCount = count($limaDataAwal);

        $level[0] = array_sum($limaDataAwal) / 5;

        for ($i = 1; $i < $dataCount; $i++) {
            $totalTrendAwal += $limaDataAwal[$i] - $limaDataAwal[$i - 1];
        }

        $trend[0] = $totalTrendAwal / ($dataCount - 1);

        for ($i = 0; $i < $seasonLength; $i++) {
            $season[$i] = $limaDataAwal[$i] / $level[0];
        }

        $levelSmoothing[0] = $alpha * ($limaDataAkhir[0] / $season[0]) + (1 - $alpha) * ($level[0] + $trend[0]);
        $trendSmoothing[0] = $beta * ($levelSmoothing[0] - $level[0]) + (1 - $beta) * $trend[0];
        $seasonSmoothing[0] = $gamma * ($limaDataAkhir[0] / $levelSmoothing[0]) + (1 - $gamma) * $season[0];
        $forecast[0] = ($level[0] + $trend[0]) * $season[0];

        for ($i = 1; $i < count($limaDataAkhir); $i++) {
            $levelSmoothing[$i] = $alpha * ($limaDataAkhir[$i] / $season[$i]) + (1 - $alpha) * ($levelSmoothing[$i - 1] + $trendSmoothing[$i - 1]);
            $trendSmoothing[$i] = $beta * ($levelSmoothing[$i] - $levelSmoothing[$i - 1]) + (1 - $beta) * $trendSmoothing[$i - 1];
            $seasonSmoothing[$i] = $gamma * ($limaDataAkhir[$i] / $levelSmoothing[$i]) + (1 - $gamma) * $season[$i];
            $forecast[$i] = ($levelSmoothing[$i - 1] + $trendSmoothing[$i - 1]) * $season[$i];
        }

        for ($i = 0; $i < count($limaDataAkhir); $i++) {
            $error[$i] = $limaDataAkhir[$i] - $forecast[$i];
        }

        for ($i = 0; $i < count($limaDataAkhir); $i++) {
            $MAPE[$i] = abs($error[$i]) / $limaDataAkhir[$i];
        }

        $averageMAPE = (array_sum($MAPE) / 5) * 100;
        for ($i = 0; $i < count($limaDataAkhir); $i++) {
            $nextForecast[$i] = ($levelSmoothing[4] + (($i + 1) * $trendSmoothing[4])) * $seasonSmoothing[$i];
        }

        return response()->json([
            'selectedRatio' => $selectedRatio,
            'formattedRatio' => $formattedRatio,
            'dataAwal' => $dataAwal,
            'data' => $data,
            'limaDataAwal' => $limaDataAwal,
            'season' => $season,
            'level' => $level,
            'trend' => $trend,
            'dataCount' => $dataCount,
            'totalTrendAwal' => $totalTrendAwal,
            'levelawal' => $level[0],
            'levelSmoothing' => $levelSmoothing,
            'trendawal' => $trend[0],
            'trendSmoothing' => $trendSmoothing,
            'seasonawal' => $season,
            'seasonSmoothing' => $seasonSmoothing,
            'NamaRasio' => $formattedRatio,
            'forecast' => $forecast,
            'nextForecast' => $nextForecast,
            'limaDataAkhir' => $limaDataAkhir,
            'count' => $n,
            'error' => $error,
            'MAPE' => $MAPE,
            'averageMAPE' => $averageMAPE,
        ]);
    }
}
