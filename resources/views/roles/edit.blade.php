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
                        <h3>Edit Role</h3>
                        <p class="text-subtitle text-muted">Handle role Data</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Role</li>
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
                            Data Role
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

                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $role->name) }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" @error('description') is-invalid @enderror>{{ old('description', $role->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="redirect_to" class="form-label">Redirect To</label>
                                <select class="form-control" id="redirect_to" name="redirect_to" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="dashboard" {{ old('redirect_to', $role->redirect_to) == 'dashboard' ? 'selected' : '' }}>Dashboard (Admin/HRD)</option>
                                    <option value="employee.dashboard" {{ old('redirect_to', $role->redirect_to) == 'employee.dashboard' ? 'selected' : '' }}>Employee Dashboard</option>
                                </select>
                                @error('redirect_to')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Role</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back to List</a>

                        </form>

                    </div>
                </div>

            </section>
        </div>
    @endsection
