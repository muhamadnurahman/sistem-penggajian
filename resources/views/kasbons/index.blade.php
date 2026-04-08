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
                        <p class="text-subtitle text-muted">Manage your Kasbons efficiently</p>
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
                            Data Kasbon
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <a href="{{ route('kasbons.create') }}" class="btn btn-primary mb-3 ms-auto">
                                Add Kasbon
                            </a>
                        </div>
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Is Paid</th>
                                    <th>Date</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kasbons as $kasbon)
                                    <tr>
                                        <td>{{ $kasbon->employee->name }}</td>
                                        <td>{{ number_format($kasbon->amount, 0, ',', '.') }}</td>
                                        <td>{{ $kasbon->description }}</td>
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
                                        <td>{{ \Carbon\Carbon::parse($kasbon->date)->format('d F Y') }}</td>

                                        <td>
                                            <a href="{{ route('kasbons.show', $kasbon->id) }}"
                                                class="btn btn-sm btn-info">View</a>

                                            <a href="{{ route('kasbons.edit', $kasbon->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('kasbons.destroy', $kasbon->id) }}" method="POST"
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