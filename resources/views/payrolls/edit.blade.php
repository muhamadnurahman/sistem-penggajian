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
                        <h3>Payrolls</h3>
                        <p class="text-subtitle text-muted">Handle payroll Data</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('payrolls.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Payroll</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Data Payrolls
                        </h5>
                    </div>
                    <div class="card-body">
                    
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('payrolls.update', $payroll->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="employee_id" class="form-label" hidden>Employee</label>
                                <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ old('employee_id', $payroll->employee->id) }}" required hidden>
                                @error('employee_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $payroll->employee->name) }}" required readonly>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="number" class="form-control" id="salary" name="salary" value="{{ old('salary', $payroll->salary) }}" required>
                                @error('salary')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="bonuses" class="form-label">Bonuses</label>
                                <input type="number" class="form-control" id="bonuses" name="bonuses" value="{{ old('bonuses', $payroll->bonuses) }}" required>
                                @error('bonuses')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="deductions" class="form-label">Deductions</label>
                                <input type="number" class="form-control" id="deductions" name="deductions" value="{{ old('deductions', $payroll->deductions) }}" required>
                                @error('deductions')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pay_date" class="form-label">Pay Date</label>
                                <input type="date" class="form-control" id="pay_date" name="pay_date" value="{{ old('pay_date', $payroll->pay_date) }}" required>
                                @error('pay_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Payroll</button>
                            <a href="{{ route('payrolls.index') }}" class="btn btn-secondary">Back to List</a>

                        </form>

                    </div>
                </div>

            </section>
        </div>
    @endsection
