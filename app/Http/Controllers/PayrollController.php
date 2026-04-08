<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\Employee;
use App\Models\Kasbon;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::with('employee')->get();
        return view('payrolls.index', compact('payrolls'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('payrolls.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'salary' => 'required|numeric|min:0',
            'bonuses' => 'nullable|numeric|min:0',
            'pay_date' => 'required|date',
        ]);

        $totalKasbon = Kasbon::where('employee_id', $validatedData['employee_id'])
            ->where('status', 'approved')
            ->where('is_paid', false)
            ->sum('amount');

        $validatedData['deductions'] = $totalKasbon;
        $netSalary = $validatedData['salary'] + ($validatedData['bonuses'] ?? 0) - ($validatedData['deductions'] ?? 0);
        $validatedData['net_salary'] = $netSalary;

        $payroll = Payroll::create($validatedData);

        Kasbon::where('employee_id', $validatedData['employee_id'])
            ->where('status', 'approved')
            ->where('is_paid', false)
            ->update(
                ['is_paid' => true,
                 'payroll_id' => $payroll->id
                ]);

        return redirect()->route('payrolls.index')->with('success', 'Payroll created successfully.');
    }

    public function show($id)
    {
        $payroll = Payroll::with('employee')->findOrFail($id);
        return view('payrolls.show', compact('payroll'));
    }

    public function edit($id)
    {
        $payroll = Payroll::findOrFail($id);
        $employees = Employee::all();
        return view('payrolls.edit', compact('payroll', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $payroll = Payroll::findOrFail($id);

        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'salary' => 'required|numeric|min:0',
            'bonuses' => 'nullable|numeric|min:0',
            'pay_date' => 'required|date',
        ]);
        $netSalary = $validatedData['salary'] + ($validatedData['bonuses'] ?? 0) - ($validatedData['deductions'] ?? 0);
        $validatedData['net_salary'] = $netSalary;
        $payroll->update($validatedData);

        return redirect()->route('payrolls.index')->with('success', 'Payroll updated successfully.');
    }

    public function destroy($id)
    {
        $payroll = Payroll::findOrFail($id);

        Kasbon::where('payroll_id', $payroll->id)
        ->update([
            'is_paid' => false,
            'payroll_id' => null
            ]);
        $payroll->delete();

        return redirect()->route('payrolls.index')->with('success', 'Payroll deleted successfully.');
    }
}
