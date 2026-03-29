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
                        <h3>Employees</h3>
                        <p class="text-subtitle text-muted">Manage your employees efficiently</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
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
                            Data Employees
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3 ms-auto">
                                Add Employee
                            </a>
                        </div>
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Salary</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone_number }}</td>
                                        <td>{{ $employee->department->name }}</td>
                                        <td>{{ $employee->role->name }}</td>
                                        <td>
                                            @if ($employee->status == 'active')
                                                <span class="badge bg-success">{{ $employee->status }}</span>
                                            @else
                                                <span class="badge bg-warning">{{ $employee->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $employee->salary }}</td>
                                        <td>
                                            <a href="{{ route('employees.show', $employee->id) }}"
                                                class="btn btn-sm btn-info">View</a>

                                            <a href="{{ route('employees.edit', $employee->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('sure?')">Delete</button>
                                            </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    @endsection
