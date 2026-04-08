<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasbon;
use App\Models\Employee;

class KasbonController extends Controller
{
        public function index()
        {
            $kasbons = Kasbon::with('employee')->get();
            return view('kasbons.index', compact('kasbons'));
        }
    
        public function create()
        {
            $employees = Employee::all();

            return view('kasbons.create', compact('employees'));
        }
    
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'employee_id' => 'required|exists:employees,id',
                'amount' => 'required|numeric',
                'description' => 'nullable|string',
                'status' => 'required|in:pending,approved,rejected',
                'is_paid' => 'required|boolean',
            ]);

            Kasbon::create($validatedData);

            return redirect()->route('kasbons.index')->with('success', 'Kasbon created successfully.');

        }
    
        public function show($id)
        {
            $kasbon = Kasbon::with('employee')->findOrFail($id);

            return view('kasbons.show', compact('kasbon'));
        }
    
        public function edit($id)
        {
            $employees = Employee::all();
            $kasbon = Kasbon::findOrFail($id);

            return view('kasbons.edit', compact('kasbon', 'employees'));
        }
    
        public function update(Request $request, $id)
        {
            $kasbon = Kasbon::findOrFail($id);

            $validatedData = $request->validate([
                'employee_id' => 'required|exists:employees,id',
                'amount' => 'required|numeric',
                'description' => 'nullable|string',
                'status' => 'required|in:pending,approved,rejected',
                'is_paid' => 'required|boolean',
            ]);

            $kasbon->update($validatedData);

            return redirect()->route('kasbons.index')->with('success', 'Kasbon updated successfully.');
        }
    
        public function destroy($id)
        {
            $kasbon = Kasbon::findOrFail($id);
            $kasbon->delete();

            return redirect()->route('kasbons.index')->with('success', 'Kasbon deleted successfully.');
        }
}
