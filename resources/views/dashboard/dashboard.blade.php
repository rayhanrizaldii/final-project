{{-- dashboard --}}

@extends('layout.master')
@section('title', 'Dashboard')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Dashboard</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                {{-- <li class="breadcrumb-item active" aria-current="page">
                                    Layout Vertical Navbar
                                </li> --}}
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                @can('view_dashboard_admin')
                    <div class="row">
                        <div class="col-12 col-lg-12 col-md-12 d-flex justify-content-center align-items-center"
                            style="height: 60vh;">
                            <div class="card my-2 w-100 h-100">
                                <div class="card-body px-4 py-4-5">
                                    <h4 class="text-muted font-extrabold">
                                        Selamat Datang Di Dashboard Admin
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
                @can('view_chart_dashboard')
                    @php
                        $pendapatanSekarang = $total_pendapatan[9];
                        $pendapatanTahunLalu = $total_pendapatan[8];
                        $bebanSekarang = $total_beban[9];
                        $bebanTahunLalu = $total_beban[8];
                        if ($pendapatanTahunLalu > 0) {
                            $persen_pendapatan =
                                (($pendapatanSekarang - $pendapatanTahunLalu) / $pendapatanTahunLalu) * 100;
                        } else {
                            $persen_pendapatan = 0;
                        }
                        if ($bebanTahunLalu > 0) {
                            $persen_beban = (($bebanSekarang - $bebanTahunLalu) / $bebanTahunLalu) * 100;
                        } else {
                            $persen_beban = 0;
                        }
                        if ($bebanSekarang > 0) {
                            $laba_bersih_sekarang = $pendapatanSekarang - $bebanSekarang;
                        } else {
                            $laba_bersih_sekarang = 0;
                        }
                        if ($bebanTahunLalu > 0) {
                            $laba_bersih_tahun_lalu = $pendapatanTahunLalu - $bebanTahunLalu;
                        } else {
                            $laba_bersih_tahun_lalu = 0;
                        }

                        if ($laba_bersih_tahun_lalu > 0) {
                            $persen_laba_bersih =
                                (($laba_bersih_sekarang - $laba_bersih_tahun_lalu) / $laba_bersih_tahun_lalu) * 100;
                        } else {
                            $persen_laba_bersih = 0;
                        }
                    @endphp
                    <div class="row">
                        <div class="d-flex align-items-center justify-content-end mt-2">
                            <p class="text-muted font-bold">
                                *Dalam Bentuk Jutaan Rupiah.
                            </p>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="row">
                                <div class="col-12 col-lg-4 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="text-muted font-semibold mb-0">
                                                Total Pendapatan Tahun 2023
                                            </h4>
                                        </div>
                                        <div class="card-body px-4">
                                            <div class="row">
                                                <h3>Rp. {{ number_format($pendapatanSekarang, 0, ',', '.') }}</h3>
                                                <!-- Flexbox container -->
                                                <div class="d-flex align-items-center justify-content-start mt-2">
                                                    @if ($persen_pendapatan > 0)
                                                        <div class="d-inline-block p-2"
                                                            style="background-color: #40c4aa2c; color: #40C4AA; border-radius: 5px; min-width: 60px; text-align: center;">
                                                            <i class="bi bi-arrow-up-right" style="color: #40C4AA;"></i>
                                                            {{ number_format($persen_pendapatan, 2, ',', '.') }}%
                                                        </div>
                                                    @elseif($persen_pendapatan < 0)
                                                        <div class="mx-2 d-inline-block p-2"
                                                            style="background-color: rgba(255, 0, 0, 0.152); color: red; border-radius: 5px; min-width: 60px; text-align: center;">
                                                            <i class="bi bi-arrow-down-right" style="color: red;"></i>
                                                            {{ number_format($persen_pendapatan, 2, ',', '.') }}%
                                                        </div>
                                                    @else
                                                        Tidak ada perubahan
                                                    @endif
                                                    <span class="text-muted mx-2">
                                                        dari tahun lalu
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="text-muted font-semibold mb-0">
                                                Total Beban Tahun 2023
                                            </h4>
                                        </div>
                                        <div class="card-body px-4">
                                            <div class="row">
                                                <h3>Rp. {{ number_format($bebanSekarang, 0, ',', '.') }}</h3>
                                                <div class="d-flex align-items-center justify-content-start mt-2">
                                                    @if ($persen_beban > 0)
                                                        <div class="d-inline-block p-2"
                                                            style="background-color: #40c4aa2c; color: #40C4AA; border-radius: 5px; min-width: 60px; text-align: center;">
                                                            <i class="bi bi-arrow-up-right" style="color: #40C4AA;"></i>
                                                            {{ number_format($persen_beban, 2, ',', '.') }}%
                                                        </div>
                                                    @elseif($persen_beban < 0)
                                                        <div class="mx-2 d-inline-block p-2"
                                                            style="background-color: rgba(255, 0, 0, 0.152); color: red; border-radius: 5px; min-width: 60px; text-align: center;">
                                                            <i class="bi bi-arrow-down-right" style="color: red;"></i>
                                                            {{ number_format($persen_beban, 2, ',', '.') }}%
                                                        </div>
                                                    @else
                                                        Tidak ada perubahan
                                                    @endif
                                                    <span class="text-muted mx-2">
                                                        dari tahun lalu
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="text-muted font-semibold mb-0">
                                                Laba Bersih Tahun 2023
                                            </h4>
                                        </div>
                                        <div class="card-body px-4">
                                            <div class="row">
                                                <h3>Rp. {{ number_format($laba_bersih_sekarang, 0, ',', '.') }}</h3>
                                                <div class="d-flex align-items-center justify-content-start mt-2">
                                                    @if ($persen_laba_bersih > 0)
                                                        <div class="d-inline-block p-2"
                                                            style="background-color: #40c4aa2c; color: #40C4AA; border-radius: 5px; min-width: 60px; text-align: center;">
                                                            <i class="bi bi-arrow-up-right" style="color: #40C4AA;"></i>
                                                            {{ number_format($persen_laba_bersih, 2, ',', '.') }}%
                                                        </div>
                                                    @elseif($persen_laba_bersih < 0)
                                                        <div class="mx-2 d-inline-block p-2"
                                                            style="background-color: rgba(255, 0, 0, 0.152); color: red; border-radius: 5px; min-width: 60px; text-align: center;">
                                                            <i class="bi bi-arrow-down-right" style="color: red;"></i>
                                                            {{ number_format($persen_laba_bersih, 2, ',', '.') }}%
                                                        </div>
                                                    @else
                                                        Tidak ada perubahan
                                                    @endif
                                                    <span class="text-muted mx-2">
                                                        dari tahun lalu
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-8 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="text-muted font-semibold">Trend Pendapatan Vs Beban Vs Laba Bersih</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="pendapatanChart"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="text-muted font-semibold">
                                                Proporsi Pendapatan Berdasarkan Kategori Tahun 2023
                                            </h4>
                                        </div>
                                        <div class="card-body d-flex justify-content-center align-items-center">
                                            <div id="proporsi-pendapatan-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-muted font-semibold">
                                            Rasio Keuangan Tahun 2023
                                        </h4>
                                    </div>
                                    @include('dashboard.dashboard-rasio')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endcan
        </div>
    </div>

@endsection
@section('script')
    @include('dashboard.dashboard_script')
@endsection
