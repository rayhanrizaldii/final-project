{{-- permissions --}}

@extends('layout.master')
@section('title', 'Rasio Keuangan')
@section('content')
    <div id="main-content">
        @include('ratio.modalPrediksi')
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Rasio Keuangan</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('ratio') }}">Rasio Keuangan</a>
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
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-end align-items-center mb-3">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#defaultModalPrediksi">Coba
                                        Prediksi</button>
                                </div>
                                {{-- <p>{{ $level }}</p> --}}
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="likuiditas-tab" data-bs-toggle="tab"
                                            href="#likuiditas" role="tab" aria-controls="likuiditas"
                                            aria-selected="false">Likuiditas</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="profitabilitas-tab" data-bs-toggle="tab"
                                            href="#profitabilitas" role="tab" aria-controls="profitabilitas"
                                            aria-selected="true">Profitabilitas</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="solvabilitas-tab" data-bs-toggle="tab" href="#solvabilitas"
                                            role="tab" aria-controls="solvabilitas"
                                            aria-selected="false">Solvabilitas</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="aktivitas-tab" data-bs-toggle="tab" href="#aktivitas"
                                            role="tab" aria-controls="aktivitas" aria-selected="false">Aktivitas</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    @include('ratio.likuiditas')
                                    @include('ratio.profitabilitas')
                                    @include('ratio.solvabilitas')
                                    @include('ratio.aktivitas')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>



@endsection

@section('script')
    @include('ratio.ratio_script')
    <script src="{{ asset('template/assets/static/js/pages/ratio.js') }}"></script>
@endsection
