<?php

namespace App\Http\Controllers;

use App\Models\ArusKas;
use App\Models\Periode;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Menampilkan halaman laporan
    public function index(Request $request)
    {
        return view('laporan.index');
    }

    // Query umum untuk transaksi dengan optional kategori
    protected function getTransaksi($tahun, $kategori = null, $start = null, $end = null)
    {
        $query = Transaksi::with('coa')
            ->where('tahun_id', 'like', $tahun)
            ->join('coa', 'transaksi.coa_id', '=', 'coa.id');

        if ($kategori) {
            $query->join('kategori_coa', 'coa.kategori_coa_id', '=', 'kategori_coa.id')
                ->where('kategori_coa.nama_kategori', $kategori);
        }

        if ($start !== null && $end !== null) {
            $query->skip($start)->take($end);
        }

        return $query->orderBy('coa.kode', 'asc')
            ->select('transaksi.*')
            ->get();
    }

    // Menampilkan laporan Neraca
    public function viewNeraca(Request $request)
    {
        $periode = Periode::orderBy('tahun', 'asc')->get();
        $tahun = $request->input('tahun_id');
        $transaksi = $tahun ? $this->getTransaksi($tahun) : collect();
        $tahun_transaksi = $periode->where('id', $tahun)->first()->tahun ?? '';

        return view('laporan.neraca', compact('periode', 'transaksi', 'tahun_transaksi'));
    }

    // Menampilkan detail Neraca
    public function showDetailNeraca($start, $end, $tahun, $kategori)
    {
        $transaksi = $this->getTransaksi($tahun, $kategori, $start, $end);
        return response()->json(['items' => $transaksi]);
    }

    // Menampilkan laporan Aktivitas
    public function viewAktivitas(Request $request)
    {
        $periode = Periode::orderBy('tahun', 'asc')->get();
        $tahun = $request->input('tahun_id');
        $transaksi = $tahun ? $this->getTransaksi($tahun) : collect();
        $tahun_transaksi = $periode->where('id', $tahun)->first()->tahun ?? '';


        // dd($transaksi);

        return view('laporan.aktivitas', compact('periode', 'transaksi', 'tahun_transaksi'));
    }

    // Menampilkan detail Aktivitas
    public function showDetailAktivitas($start, $end, $tahun, $kategori)
    {
        $transaksi = $this->getTransaksi($tahun, $kategori, $start, $end);
        return response()->json(['items' => $transaksi]);
    }

    protected function getArusKas($tahun)
    {
        $query = ArusKas::query()
            ->where('tahun_id', 'like', $tahun);

        return $query->orderBy('kode', 'asc')
            ->get();
    }

    public function viewArusKas(Request $request)
    {
        $periode = Periode::orderBy('tahun', 'asc')->get();
        $tahun_id = $request->input('tahun_id');
        $arus_kas = $tahun_id ? $this->getArusKas($tahun_id) : collect();
        $tahun_aruskas = $periode->where('id', $tahun_id)->first()->tahun ?? '';

        return view('laporan.arusKas', compact('periode', 'arus_kas', 'tahun_aruskas', 'tahun_id'));
    }

    public function showDetailArusKas($start, $tahun)
    {
        $arus_kas = ArusKas::query()
            ->where('tahun_id', 'like', $tahun)
            ->where('kode', 'like', $start . '%')
            ->orderBy('kode', 'asc')
            ->get();

        if ($arus_kas->count() > 0) {
            $arus_kas->shift(); // Menghapus elemen pertama
        }

        return response()->json(['items' => $arus_kas]);
    }
}
