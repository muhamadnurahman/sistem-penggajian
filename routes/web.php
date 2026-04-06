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

Route::get('/', function () {
    return view('welcome');
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
    Route::resource('employee/payrolls', EmployeePayrollController::class)->names([
        'index' => 'employee.payrolls.index',
        'show' => 'employee.payrolls.show',
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
