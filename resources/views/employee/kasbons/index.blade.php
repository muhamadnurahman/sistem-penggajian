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
                        <h3>Kasbons</h3>
                        <p class="text-subtitle text-muted">Lihat semua permintaan kasbon Anda</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('employee.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kasbons</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Daftar Kasbon
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <a href="{{ route('employee.kasbons.create') }}" class="btn btn-primary mb-3 ms-auto">
                                Request Kasbon
                            </a>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Lunas</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kasbons as $kasbon)
                                    <tr>
                                        <td>{{ number_format($kasbon->amount, 0, ',', '.') }}</td>
                                        <td>{{ $kasbon->description ?? '-' }}</td>
                                        <td>
                                            @if ($kasbon->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif ($kasbon->status == 'approved')
                                                <span class="badge bg-success">Approved</span>
                                            @else
                                                <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($kasbon->is_paid == true)
                                                <span class="badge bg-success">Lunas</span>
                                            @else
                                                <span class="badge bg-danger">Belum Lunas</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($kasbon->date)->format('d-m-Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <i class="bi bi-inbox fs-1"></i><br>
                                            <p class="text-muted">Belum ada permintaan kasbon</p>
                                            <a href="{{ route('employee.kasbons.create') }}" class="btn btn-primary btn-sm">Buat Permintaan Kasbon</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    @endsection