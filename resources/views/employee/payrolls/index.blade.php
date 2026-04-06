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
                        <p class="text-subtitle text-muted">See all your payrolls here</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('employee.dashboard') }}">Dashboard</a></li>
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
                            Data Payrolls
                        </h5>
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
                                            <a href="{{ route('employee.payrolls.show', $payroll->id) }}"
                                                class="btn btn-sm btn-info">Salary Slip</a>
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