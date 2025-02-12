{{-- Data Laporan Keuangan --}}

@extends('layout.master')
@section('title', 'Laporan Keuangan')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Laporan</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('reports') }}">Laporan</a>
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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Neraca</h4>
                            </div>
                            <div class="card-body">
                                <p>Menampilkan apa yang dimiliki (aset), apa saja utangnya (liabilitas), dan apa yang sudah
                                    diinvestasikan ke perusahaan ini (ekuitas).</p>
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('reports.neraca') }}" class="btn btn-outline-primary me-1 mb-1">Lihat
                                        Laporan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Aktivitas</h4>
                            </div>
                            <div class="card-body">
                                <p>Laporan aktivitas ini memberikan gambaran mengenai pendapatan dan beban perusahaan selama
                                    periode tertentu.</p>
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('reports.aktivitas') }}"
                                        class="btn btn-outline-primary me-1 mb-1">Lihat Laporan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Arus Kas</h4>
                            </div>
                            <div class="card-body">
                                <p>Menampilkan pergerakan uang masuk dan keluar dari transaksi dalam periode tertentu.</p>
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('reports.arusKas') }}" class="btn btn-outline-primary me-1 mb-1">Lihat
                                        Laporan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Perubahan Ekuitas</h4>
                            </div>
                            <div class="card-body">
                                <p>menampilkan laporan perubahan ekuitas</p>
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="#" class="btn btn-outline-primary me-1 mb-1">Lihat Laporan</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </section>
        </div>
    </div>
@endsection
