{{--  Laporan Neraca --}}

@extends('layout.master')
@section('title', 'Laporan Neraca')
@section('content')
    <div id="main-content">
        @include('laporan.modalNeraca')
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
                                    Neraca
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
                                    <h4>Laporan Neraca</h4>
                                @else
                                    <h4>
                                        Laporan Neraca Tahun {{ $tahun_transaksi }}
                                    </h4>
                                @endif
                                <form class="form" id="filterForm" method="get" action="{{ route('reports.neraca') }}">
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
                                                <td colspan="3"><strong>Aset</strong></td>
                                            </tr>
                                            @php
                                                $totalAset = 0;
                                                $totalLiabilitas = 0;
                                                $totalEkuitas = 0;
                                                $totalAL = 0;
                                                $totalATL = 0;
                                                $totalLJP = 0;
                                                $totalLJPP = 0;
                                            @endphp
                                            @foreach ($transaksi->slice(0, 30) as $index => $item)
                                                @php
                                                    $totalAL += $item->debit - $item->kredit;
                                                @endphp
                                            @endforeach
                                            @foreach ($transaksi->slice(31, 10) as $index => $item)
                                                @php
                                                    $totalATL += $item->debit - $item->kredit;
                                                @endphp
                                            @endforeach
                                            @foreach ($transaksi->slice(41, 30) as $index => $item)
                                                @php
                                                    $totalLJP += $item->kredit;
                                                @endphp
                                            @endforeach
                                            @foreach ($transaksi->slice(73, 8) as $index => $item)
                                                @php
                                                    $totalLJPP += $item->kredit;
                                                @endphp
                                            @endforeach
                                            @foreach ($transaksi->slice(87, 2) as $index => $item)
                                                @php
                                                    $totalEkuitas += $item->kredit;
                                                @endphp
                                            @endforeach
                                            @foreach ($transaksi->slice(0, 1) as $index => $item)
                                                <tr>
                                                    <td>{{ $item->coa->kode }}</td>
                                                    <td>
                                                        {{ $item->coa->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $totalAL > 0 ? 'Rp ' . number_format($totalAL, 0, ',', '.') : '' }}
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary me-1 mb-1" data-bs-toggle="modal"
                                                            data-bs-target="#default" data-start="1" data-end="29"
                                                            data-tahun={{ $item->tahun_id }} data-kategori="Aset">
                                                            Detail
                                                        </button>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            @foreach ($transaksi->slice(30, 1) as $index => $item)
                                                <tr>
                                                    <td>{{ $item->coa->kode }}</td>
                                                    <td>
                                                        {{ $item->coa->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $totalATL > 0 ? 'Rp ' . number_format($totalATL, 0, ',', '.') : '' }}
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary me-1 mb-1" data-bs-toggle="modal"
                                                            data-bs-target="#default" data-start="31" data-end="40"
                                                            data-tahun={{ $item->tahun_id }} data-kategori="Aset">
                                                            Detail
                                                        </button>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            @php
                                                $toalAset = $totalAL + $totalATL;
                                            @endphp
                                            <tr>
                                                <td></td>
                                                <td class="text-end">Total Aset</td>
                                                <td class="text-end">
                                                    {{ $toalAset > 0 ? 'Rp ' . number_format($toalAset, 0, ',', '.') : '' }}
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="3"><strong>Liabilitas</strong></td>
                                            </tr>
                                            @foreach ($transaksi->slice(41, 1) as $index => $item)
                                                <tr>
                                                    <td>{{ $item->coa->kode }}</td>
                                                    <td>
                                                        {{ $item->coa->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $totalLJP > 0 ? 'Rp ' . number_format($totalLJP, 0, ',', '.') : '' }}
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary me-1 mb-1" data-bs-toggle="modal"
                                                            data-bs-target="#default" data-start="1" data-end="29"
                                                            data-tahun={{ $item->tahun_id }} data-kategori="Liabilitas">
                                                            Detail
                                                        </button>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            @foreach ($transaksi->slice(71, 1) as $index => $item)
                                                <tr>
                                                    <td>{{ $item->coa->kode }}</td>
                                                    <td>
                                                        {{ $item->coa->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $totalLJPP > 0 ? 'Rp ' . number_format($totalLJPP, 0, ',', '.') : '' }}
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary me-1 mb-1" data-bs-toggle="modal"
                                                            data-bs-target="#default" data-start="31" data-end="40"
                                                            data-tahun={{ $item->tahun_id }} data-kategori="Liabilitas">
                                                            Detail
                                                        </button>
                                                    </td>

                                                </tr>
                                                @php
                                                    $totalLiabilitas = $totalLJP + $totalLJPP;
                                                @endphp
                                                <tr>
                                                    <td></td>
                                                    <td class="text-end">Total Liabilitas</td>
                                                    <td class="text-end">
                                                        {{ $totalLiabilitas > 0 ? 'Rp ' . number_format($totalLiabilitas, 0, ',', '.') : '' }}
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td colspan="3"><strong>Ekuitas</strong></td>
                                            </tr>
                                            @foreach ($transaksi->slice(81, 8) as $index => $item)
                                                <tr>
                                                    <td>{{ $item->coa->kode }}</td>
                                                    <td
                                                        style="text-indent: {{ substr($item->coa->kode, -1) === '0' && substr($item->coa->kode, 0, -1) !== '300' ? '10px' : (substr($item->coa->kode, -2) === '00' ? '0' : '30px') }};">
                                                        {{ $item->coa->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $item->kredit > 0 ? 'Rp ' . number_format($item->kredit, 0, ',', '.') : '' }}
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td class="text-end">Total Ekuitas</td>
                                                <td class="text-end">
                                                    {{ $totalEkuitas > 0 ? 'Rp ' . number_format($totalEkuitas, 0, ',', '.') : '' }}
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="text-end">Total Liabilitas dan Ekuitas</td>
                                                <td class="text-end">
                                                    {{ $totalLiabilitas + $totalEkuitas > 0 ? 'Rp ' . number_format($totalLiabilitas + $totalEkuitas, 0, ',', '.') : '' }}
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
                </div>
            </section>
        </div>
    </div>
    <script src="{{ asset('template/assets/static/js/pages/laporan.js') }}"></script>

@endsection
