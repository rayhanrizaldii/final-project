{{-- roles --}}

@extends('layout.master')
@section('title', 'Roles Dashboard')
@section('content')
    <div id="main-content">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        {{-- <h3>Permissions</h3> --}}
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('roles') }}">Roles</a>
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
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title">
                            Roles
                            <a href="{{ url('roles/create') }}" class="btn btn-primary float-end">Add Roles</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive datatable-minimal">
                            <table class="table" id="table2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <a href="{{ url('roles/' . $role->uuid . '/give-permissions') }}"
                                                    class="btn btn-light-warning me-1 mb-1">
                                                    Add / Edit Role Permission
                                                </a>
                                                <a href="{{ url('roles/' . $role->uuid . '/edit') }}"
                                                    class="btn btn-light-success me-1 mb-1">
                                                    Edit
                                                </a>
                                                <a href="{{ url('roles/' . $role->uuid . '/delete') }}"
                                                    class="btn btn-light-danger me-1 mb-1">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
