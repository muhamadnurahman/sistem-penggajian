<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;
use Illuminate\Support\Facades\Auth;

class EmployeePayrollController extends Controller
{
        public function index()
        {
            $employee = Auth::user()->employee;
            $payrolls = $employee?->payrolls()->latest('pay_date')->get();

            return view('employee.payrolls.index', compact('payrolls'));
        }
    
        public function show($id)
        {
            $employee = Auth::user()->employee;

            $payroll = $employee?->payrolls()->findOrFail($id);
            
            return view('employee.payrolls.show', compact('payroll'));
        }
}
