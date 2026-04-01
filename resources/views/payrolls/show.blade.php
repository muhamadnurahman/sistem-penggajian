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
                        <h3>Payroll Detail</h3>
                        <p class="text-subtitle text-muted">Handle payroll Data</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('payrolls.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Payroll</li>
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
                            Detail Payroll
                        </h5>
                    </div>
                    <div class="card-body">
                    
                    <div class="mb-3">
                        <label for="">Name</label>
                        <p>{{ $payroll->employee->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="">Salary</label>
                        <p>{{ number_format($payroll->salary) }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="">Bonuses</label>
                        <p>{{ number_format($payroll->bonuses) }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="">Deductions</label>
                        <p>{{ number_format($payroll->deductions) }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="">Net Salary</label>
                        <p>{{ number_format($payroll->net_salary) }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="">Pay Date</label>
                        <p>{{ \Carbon\Carbon::parse($payroll->pay_date)->format('d F Y') }}</p>
                    </div>

                    <button type="button" id="print" class="btn btn-primary"><span class="bi bi-printer"></span> Print</button>
                    <a href="{{ route('payrolls.index') }}" class="btn btn-secondary">Back</a>
                </div>

            </section>
        </div>
    @endsection
