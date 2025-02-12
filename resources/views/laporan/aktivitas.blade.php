{{--  Laporan Neraca --}}

@extends('layout.master')
@section('title', 'Laporan Aktivitas')
@section('content')
    <div id="main-content">
        @include('laporan.modalAktivitas')
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('reports') }}">Laporan</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Aktivitas
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                @if (session('status'))
                    <div id="status-message" class="alert alert-success"><i class="bi bi-check-circle"></i>
                        {{ session('status') }}</div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                @if (!$tahun_transaksi)
                                    <h4>Laporan Aktivitas</h4>
                                @else
                                    <h4>
                                        Laporan Aktivitas Tahun {{ $tahun_transaksi }}
                                    </h4>
                                @endif
                                <form class="form" id="filterForm" method="get"
                                    action="{{ route('reports.aktivitas') }}">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="tahun">Periode</label>
                                        <select class="form-select" id="tahun_id" name="tahun_id" style="width: 250px">
                                            <option selected>Pilih...</option>
                                            @foreach ($periode as $tahun)
                                                <option value="{{ $tahun->id }}">{{ $tahun->tahun }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <h6 class="text-end">*disajikan dalam jutaan Rupiah, kecuali dinyatakan lain</h6>
                                <div class="table-responsive" style="{{ $transaksi->isEmpty() ? 'display:none;' : '' }}">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th colspan="2">Uraian</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td colspan="3"><strong>Pendapatan</strong></td>
                                            </tr>
                                            @php
                                                $totalPendapatan = 0;
                                                $totalBeban = 0;
                                                $totalBebanUsaha = 0;
                                                $totalLabaKotor = 0;
                                                $totalBebanLain = 0;
                                                $totalLabaSblmPajak = 0;
                                                $totalPajak = 0;
                                                $totalLabaBersih = 0;
                                            @endphp
                                            @foreach ($transaksi->slice(89, 5) as $index => $item)
                                                @php
                                                    $totalPendapatan += $item->kredit - $item->debit;
                                                @endphp
                                            @endforeach
                                            @foreach ($transaksi->slice(94, 6) as $index => $item)
                                                @php
                                                    $totalBeban += $item->debit - $item->kredit;
                                                @endphp
                                            @endforeach
                                            @foreach ($transaksi->slice(100, 6) as $index => $item)
                                                @php
                                                    $totalBebanUsaha += $item->debit - $item->kredit;
                                                @endphp
                                            @endforeach

                                            @php
                                                $totalLabaKotor = $totalPendapatan - $totalBeban;
                                            @endphp
                                            @php
                                                $totalLabaOperasional = $totalLabaKotor - $totalBebanUsaha;
                                            @endphp
                                            @foreach ($transaksi->slice(106, 5) as $index => $item)
                                                @php
                                                    $totalBebanLain += $item->debit - $item->kredit;
                                                    $totalLabaSblmPajak = $totalLabaOperasional - $totalBebanLain;
                                                @endphp
                                            @endforeach
                                            @foreach ($transaksi->slice(111, 3) as $index => $item)
                                                @php
                                                    $totalPajak += $item->debit - $item->kredit;
                                                    $totalLabaBersih = $totalLabaSblmPajak - $totalPajak;
                                                @endphp
                                            @endforeach
                                            @foreach ($transaksi->slice(89, 1) as $index => $item)
                                                <tr>
                                                    <td>{{ $item->coa->kode }}</td>
                                                    <td>
                                                        {{ $item->coa->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $totalPendapatan > 0 ? 'Rp ' . number_format($totalPendapatan, 0, ',', '.') : '' }}
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary me-1 mb-1" data-bs-toggle="modal"
                                                            data-bs-target="#defaultAktivitas" data-start="1" data-end="5"
                                                            data-tahun={{ $item->tahun_id }} data-kategori="Pendapatan">
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td colspan="3"><strong>Beban</strong></td>
                                            </tr>
                                            @foreach ($transaksi->slice(94, 1) as $index => $item)
                                                <tr>
                                                    <td>{{ $item->coa->kode }}</td>
                                                    <td>
                                                        {{ $item->coa->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $totalBeban > 0 ? 'Rp ' . ' (' . number_format($totalBeban, 0, ',', '.') . ')' : '' }}

                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary me-1 mb-1" data-bs-toggle="modal"
                                                            data-bs-target="#defaultAktivitas" data-start="1" data-end="5"
                                                            data-tahun={{ $item->tahun_id }} data-kategori="Beban">
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td class="text-end">Laba Kotor</td>
                                                <td class="text-end">
                                                    {{ $totalLabaKotor > 0 ? 'Rp ' . number_format($totalLabaKotor, 0, ',', '.') : '' }}
                                                </td>
                                                <td></td>
                                            </tr>
                                            @foreach ($transaksi->slice(100, 1) as $index => $item)
                                                <tr>
                                                    <td>{{ $item->coa->kode }}</td>
                                                    <td>
                                                        {{ $item->coa->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $totalBebanUsaha > 0 ? 'Rp ' . ' (' . number_format($totalBebanUsaha, 0, ',', '.') . ')' : '' }}

                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary me-1 mb-1" data-bs-toggle="modal"
                                                            data-bs-target="#defaultAktivitas" data-start="7" data-end="5"
                                                            data-tahun={{ $item->tahun_id }} data-kategori="Beban">
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td class="text-end">Laba Operasional</td>
                                                <td class="text-end">
                                                    {{ $totalLabaOperasional > 0 ? 'Rp ' . number_format($totalLabaOperasional, 0, ',', '.') : '' }}
                                                </td>
                                                <td></td>
                                            </tr>
                                            @foreach ($transaksi->slice(106, 5) as $index => $item)
                                                <tr>
                                                    <td>{{ $item->coa->kode }}</td>
                                                    <td
                                                        style="text-indent: {{ substr($item->coa->kode, -1) === '0' && substr($item->coa->kode, 0, -1) !== '630' ? '10px' : (substr($item->coa->kode, -2) === '00' ? '0' : '30px') }};">
                                                        {{ $item->coa->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $item->debit > 0 ? 'Rp ' . ' (' . number_format($item->debit, 0, ',', '.') . ')' : '' }}
                                                        {{ $item->kredit > 0 ? 'Rp ' . number_format($item->kredit, 0, ',', '.') : '' }}
                                                    </td>
                                                    <td class="text-end">
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td class="text-end">Laba Sebelum Pajak Penghasilan</td>
                                                <td class="text-end">
                                                    {{ $totalLabaSblmPajak > 0 ? 'Rp ' . number_format($totalLabaSblmPajak, 0, ',', '.') : 'none' }}
                                                </td>
                                                <td></td>
                                            </tr>
                                            @foreach ($transaksi->slice(111, 3) as $index => $item)
                                                <tr>
                                                    <td>{{ $item->coa->kode }}</td>
                                                    <td
                                                        style="text-indent: {{ substr($item->coa->kode, -1) === '0' && substr($item->coa->kode, 0, -1) !== '640' ? '10px' : (substr($item->coa->kode, -2) === '00' ? '0' : '30px') }};">
                                                        {{ $item->coa->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $item->debit > 0 ? 'Rp ' . ' (' . number_format($item->debit, 0, ',', '.') . ')' : '' }}
                                                        {{ $item->kredit > 0 ? 'Rp ' . number_format($item->kredit, 0, ',', '.') : '' }}
                                                    </td>
                                                    <td class="text-end">
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td class="text-end">Laba Tahun Berjalan / Laba Bersih</td>
                                                <td class="text-end">
                                                    {{ $totalLabaBersih > 0 ? 'Rp ' . number_format($totalLabaBersih, 0, ',', '.') : 'none' }}
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if ($transaksi->isEmpty())
                                    <p class="text-center">
                                        Atur filter Anda untuk melihat hasil.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Filter</h4>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div> --}}

                </div>

            </section>
        </div>
    </div>
    <script src="{{ asset('template/assets/static/js/pages/laporan.js') }}"></script>
@endsection
