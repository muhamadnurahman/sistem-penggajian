<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasbon;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeKasbonController extends Controller
{
    public function index()
    {
        $employee = Auth::user()->employee;

        if (!$employee) {
            abort(403, 'Not authorized');
        }

        $kasbons = $employee->kasbons()->get();
        return view('employee.kasbons.index', compact('kasbons'));
    }

    public function create()
    {
        $employee = Auth::user()->employee;

        if (!$employee) {
            abort(403, 'Not authorized');
        }

        return view('employee.kasbons.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $employee = Auth::user()->employee;

        if (!$employee) {
            abort(403, 'Not authorized');
        }

        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0|max:10000000000',
            'description' => 'nullable|string',
        ], [
            'amount.max' => 'Kasbon tidak boleh lebih dari 10 miliar.',
        ]);

        $validatedData['employee_id'] = $employee->id;
        $validatedData['status'] = 'pending';
        $validatedData['is_paid'] = false;

        Kasbon::create($validatedData);

        return redirect()->route('employee.kasbons.index')->with('success', 'Kasbon request created successfully.');
    }
}
