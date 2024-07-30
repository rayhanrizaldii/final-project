{{-- edit role --}}

@extends('layout.master')
@section('title', 'Edit Role')
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
                                    <a href="{{ url('permissions') }}">Roles</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Role
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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Role : {{ $role->name }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @error('permission')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <h5>Permissions</h5>
                            <form class="form form-vertical"
                                action="{{ url('roles/' . $role->uuid . '/give-permissions') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <ul class="list-unstyled mb-0 mt-3">
                                        @foreach ($permissions as $permission)
                                            <li class="d-inline-block me-2 mb-1">
                                                <div class="form-check">
                                                    <div class="checkbox">
                                                        <label>{{ $permission->name }}</label>
                                                        <input type="checkbox" name="permission[]"
                                                            value="{{ $permission->name }}"
                                                            {{ in_array($permission->uuid, $rolePermissions) ? 'checked' : '' }}
                                                            class="form-check-input">
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="col-12 d-flex justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        <a href="{{ url('/roles') }}" class="btn btn-light-danger me-1 mb-1">
                                            Back
                                        </a>
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
