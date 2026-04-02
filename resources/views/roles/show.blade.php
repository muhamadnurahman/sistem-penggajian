@extends('layouts.dashboard')
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Role Detail</h3>
                        <p class="text-subtitle text-muted">Handle role Data</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Role</li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Detail Role
                        </h5>
                    </div>
                    <div class="card-body">
                    
                    <div class="mb-3">
                        <label for="">Name</label>
                        <p>{{ $role->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="">Description</label>
                        <p>{{ $role->description }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <label for="">Created At</label>
                        <p>{{ $role->created_at->format('d F Y H:i:s') }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="">Deleted At</label>
                        <p>
                            @if ($role->deleted_at)
                                {{ $role->deleted_at->format('d F Y H:i:s') }}
                            @else
                                Not Deleted
                            @endif
                        </p>
                    </div>

                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
                </div>

            </section>
        </div>
    @endsection
