<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeDashboardController extends Controller
{
    public function index()
    {
        $employee = Auth::user()->employee;
        $latestPayroll = $employee?->payrolls()->latest('pay_date')->first();

        return view('employee/dashboard.index', compact('employee', 'latestPayroll'));
    }
}
