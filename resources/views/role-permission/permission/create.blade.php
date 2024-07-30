{{-- create permission --}}

@extends('layout.master')
@section('title', 'Create Permission')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        {{-- <h3>Dashboard Admin</h3> --}}
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('permissions') }}">Permissions</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Create Permission
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Create Permission</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ url('permissions') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Permission Name</label>
                                                <input type="text" id="name" class="form-control"
                                                    name="name" placeholder="...">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end mt-1">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            <a href="{{ url('/permissions') }}" class="btn btn-light-danger me-1 mb-1">
                                                Back
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
