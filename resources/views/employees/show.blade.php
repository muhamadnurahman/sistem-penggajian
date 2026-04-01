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
                        <h3>Employee Detail</h3>
                        <p class="text-subtitle text-muted">Handle employee Data</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Employee</li>
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
                            Detail Employee
                        </h5>
                    </div>
                    <div class="card-body">
                    
                    <div class="mb-3">
                        <label for="">Name</label>
                        <p>{{ $employee->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="">Email</label>
                        <p>{{ $employee->email }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <label for="">Phone Number</label>
                        <p>{{ $employee->phone_number }}</p>
                </div>

                    <div class="mb-3">
                        <label for="">Address</label>
                        <p>{{ $employee->address }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="">Hire Date</label>
                        <p>{{ $employee->hire_date }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="">Department</label>
                        <p>{{ $employee->department->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="">Role</label>
                        <p>{{ $employee->role->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="">Status</label>
                        <p>
                            @if ($employee->status == 'active')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </p>
                    </div>

                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
                </div>

            </section>
        </div>
    @endsection
