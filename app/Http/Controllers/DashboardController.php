<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->employee?->role?->name;

        if (!in_array($role, ['Admin', 'HRD'])) {
            $employee = $user->employee;
            $latestPayroll = $employee?->payrolls()->latest('pay_date')->first();
            return view('dashboard.index', compact('employee', 'latestPayroll', 'role'));
        }

        $totalKaryawan = Employee::count();
        $totalDepartemen = Department::count();
        $totalPayroll = Payroll::count();
        $totalGajiBulanIni = Payroll::whereMonth('pay_date', now()->month)
            ->whereYear('pay_date', now()->year)
            ->sum('net_salary');

        return view('dashboard.index', compact(
            'totalKaryawan',
            'totalDepartemen',
            'totalPayroll',
            'totalGajiBulanIni',
            'role'
        ));
    }
}
