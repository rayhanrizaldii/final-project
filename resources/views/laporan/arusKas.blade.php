{{--  Laporan Neraca --}}

@extends('layout.master')
@section('title', 'Laporan Arus Kas')
@section('content')
    <div id="main-content">
        @include('laporan.modalArusKas')
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
                                    Arus Kas
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
                                @if (!$tahun_aruskas)
                                    <h4>Laporan Arus Kas</h4>
                                @else
                                    <h4>
                                        Laporan Arus Kas Tahun {{ $tahun_aruskas }}
                                    </h4>
                                @endif
                                <form class="form" id="filterForm" method="get" action="{{ route('reports.arusKas') }}">
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
                                <div class="table-responsive" style="{{ $arus_kas->isEmpty() ? 'display:none;' : '' }}">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th colspan="2">Uraian</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $totalAO = 0;
                                                $totalAI = 0;
                                                $totalAP = 0;
                                                $totalNK = 0;
                                                $totalKSK = 0;
                                            @endphp
                                            @foreach ($arus_kas->slice(0, 7) as $index => $item)
                                                @php
                                                    $totalAO += $item->debit - $item->kredit;
                                                @endphp
                                            @endforeach
                                            @foreach ($arus_kas->slice(8, 10) as $index => $item)
                                                @php
                                                    $totalAI += $item->debit - $item->kredit;
                                                @endphp
                                            @endforeach
                                            @foreach ($arus_kas->slice(19, 9) as $index => $item)
                                                @php
                                                    $totalAP += $item->debit - $item->kredit;
                                                @endphp
                                            @endforeach
                                            @php
                                                $totalNK += $totalAO + $totalAI + $totalAP;
                                            @endphp
                                            @foreach ($arus_kas->slice(28, 1) as $index => $item)
                                                @php
                                                    $totalKSK += $item->debit + $totalNK;
                                                @endphp
                                            @endforeach
                                            @foreach ($arus_kas->slice(0, 1) as $index => $item)
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        {{ $item->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $totalAO > 0 ? 'Rp ' . number_format($totalAO, 0, ',', '.') : ($totalAO < 0 ? 'Rp (' . number_format(abs($totalAO), 0, ',', '.') . ')' : '') }}
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary me-1 mb-1" data-bs-toggle="modal"
                                                            data-bs-target="#defaultArusKas"
                                                            data-start='{{ substr($item->kode, 0, 1) }}'
                                                            data-tahun='{{ $tahun_id }}'>
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach ($arus_kas->slice(7, 1) as $index => $item)
                                                <tr>
                                                    <td>2</td>
                                                    <td>
                                                        {{ $item->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $totalAI > 0 ? 'Rp ' . number_format($totalAI, 0, ',', '.') : ($totalAI < 0 ? 'Rp (' . number_format(abs($totalAI), 0, ',', '.') . ')' : '') }}
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary me-1 mb-1" data-bs-toggle="modal"
                                                            data-bs-target="#defaultArusKas"
                                                            data-start='{{ substr($item->kode, 0, 1) }}'
                                                            data-tahun='{{ $tahun_id }}'>
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach ($arus_kas->slice(18, 1) as $index => $item)
                                                <tr>
                                                    <td>3</td>
                                                    <td>
                                                        {{ $item->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $totalAP > 0 ? 'Rp ' . number_format($totalAP, 0, ',', '.') : ($totalAP < 0 ? 'Rp (' . number_format(abs($totalAP), 0, ',', '.') . ')' : '') }}
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-primary me-1 mb-1" data-bs-toggle="modal"
                                                            data-bs-target="#defaultArusKas"
                                                            data-start='{{ substr($item->kode, 0, 1) }}'
                                                            data-tahun='{{ $tahun_id }}'>
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td class="text-end"> Kenaikan (Penurunan) Neto Kas dan Setara Kas</td>
                                                <td class="text-end">
                                                    {{ $totalNK > 0 ? 'Rp ' . number_format($totalNK, 0, ',', '.') : ($totalNK < 0 ? 'Rp (' . number_format(abs($totalNK), 0, ',', '.') . ')' : '') }}
                                                </td>
                                                <td></td>
                                            </tr>
                                            @foreach ($arus_kas->slice(28, 1) as $index => $item)
                                                <tr>
                                                    <td></td>
                                                    <td class="text-end">
                                                        {{ $item->nama }}
                                                    </td>
                                                    <td class="text-end">
                                                        {{ $item->debit > 0 ? 'Rp ' . number_format($item->debit, 0, ',', '.') : '' }}
                                                    </td>
                                                    <td class="text-end">
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td class="text-end">Kas dan Setara Kas pada Akhir Tahun</td>
                                                <td class="text-end">
                                                    {{ $totalKSK > 0 ? 'Rp ' . number_format($totalKSK, 0, ',', '.') : ($totalKSK < 0 ? 'Rp (' . number_format(abs($totalKSK), 0, ',', '.') . ')' : '') }}
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if ($arus_kas->isEmpty())
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
