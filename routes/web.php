<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\EmployeePayrollController;
use App\Http\Controllers\KasbonController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/employee/dashboard', [EmployeeDashboardController::class, 'index'])->name('employee.dashboard');

    //department
    Route::resource('departments', DepartmentController::class);

    //employee
    Route::resource('employees', EmployeeController::class);

    //role
    Route::resource('roles', RoleController::class);

    //payroll
    Route::resource('payrolls', PayrollController::class);
    Route::get('/employee/payrolls', [EmployeePayrollController::class, 'index'])->name('employee.payrolls.index');
    Route::get('/employee/payrolls/{id}', [EmployeePayrollController::class, 'show'])->name('employee.payrolls.show');

    //kasbon
    Route::resource('kasbons', KasbonController::class);
    Route::get('/get-kasbon/{id}', function ($id) {
    return \App\Models\Kasbon::where('employee_id', $id)
        ->where('status', 'approved')
        ->where('is_paid', false)
        ->sum('amount');
});
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
