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
                        <h3>Kasbon Detail</h3>
                        <p class="text-subtitle text-muted">Handle kasbon Data</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('kasbons.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Kasbon</li>
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
                            Detail Kasbon
                        </h5>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="">Employee</label>
                            <p>{{ $kasbon->employee->name }}</p>
                        </div>

                        <div class="mb-3">
                            <label for="">Amount</label>
                            <p>{{ number_format($kasbon->amount, 0, ',', '.') }}</p>
                        </div>

                        <div class="mb-3">
                            <label for="">Description</label>
                            <p>{{ $kasbon->description }}</p>
                        </div>

                        <div class="mb-3">
                            <label for="">Status</label>
                            <p>
                                @if ($kasbon->status == 'Pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif ($kasbon->status == 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @else
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                            </p>
                        </div>

                        <div class="mb-3">
                            <label for="">Is Paid</label>
                            <p>
                                @if ($kasbon->is_paid == true)
                                    <span class="badge bg-success">Lunas</span>
                                @else
                                    <span class="badge bg-danger">Belum Lunas</span>
                                @endif
                            </p>

                            <div class="mb-3">
                                <label for="">Date</label>
                                <p>{{ \Carbon\Carbon::parse($kasbon->date)->format('d F Y') }}</p>
                            </div>


                            <a href="{{ route('kasbons.index') }}" class="btn btn-secondary">Back</a>
                        </div>

            </section>
        </div>
    @endsection
