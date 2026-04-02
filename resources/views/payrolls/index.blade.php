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
                        <p class="text-subtitle text-muted">Manage your payrolls efficiently</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Data Departments
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <a href="{{ route('payrolls.create') }}" class="btn btn-primary mb-3 ms-auto">
                                Add Payroll
                            </a>
                        </div>
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Salary</th>
                                    <th>Bonuses</th>
                                    <th>Deductions</th>
                                    <th>Net Salary</th>
                                    <th>Pay Date</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payrolls as $payroll)
                                    <tr>
                                        <td>{{ $payroll->employee->name }}</td>
                                        <td>{{ number_format($payroll->salary ?? 0, 0, ',', '.') }}</td>
                                        <td>{{ number_format($payroll->bonuses ?? 0, 0, ',', '.') }}</td>
                                        <td>{{ number_format($payroll->deductions ?? 0, 0, ',', '.') }}</td>
                                        <td>{{ number_format($payroll->net_salary ?? 0, 0, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($payroll->pay_date)->format('d F Y') }}</td>
                                        <td>
                                            <a href="{{ route('payrolls.show', $payroll->id) }}"

                                                class="btn btn-sm btn-info">Salary Slip</a>

                                            <a href="{{ route('payrolls.edit', $payroll->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('payrolls.destroy', $payroll->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    @endsection