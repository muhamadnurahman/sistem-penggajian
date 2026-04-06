<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['role', 'department', 'payrolls'])->get();

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $roles = Role::all();

        return view('employees.create', compact('departments', 'roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string|max:15',
            'address' => 'nullable|string',
            'hire_date' => 'required|date',
            'department_id' => 'required',
            'role_id' => 'required',
            'status' => 'required|in:active,inactive',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        Employee::create([
            'user_id' => $user->id,
            'role_id' => $validatedData['role_id'],
            'department_id' => $validatedData['department_id'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone_number'],
            'address' => $validatedData['address'],
            'hire_date' => $validatedData['hire_date'],
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('employees.index')
                        ->with('success', 'Employee created successfully.')
                        ->with('generated_password', $validatedData['password']);
    }

    public function show($id)
    {
        $employee = Employee::with(['role', 'department', 'payrolls'])->findOrFail($id);

        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $roles = Role::all();

        return view('employees.edit', compact('employee', 'departments', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('employees')->ignore($employee->id),
                Rule::unique('users', 'email')->ignore($employee->user_id),
            ],
            'phone_number' => 'required|string|max:15',
            'address' => 'nullable|string',
            'hire_date' => 'required|date',
            'department_id' => 'required',
            'role_id' => 'required',
            'status' => 'required|in:active,inactive',
            'password' => 'nullable|string|min:8',
        ]);


        if ($employee->user_id) {
            $dataUser = $employee->user;
            $dataUser->name = $validatedData['name'];
            $dataUser->email = $validatedData['email'];

            if (!empty($validatedData['password'])) {
                $dataUser['password'] = bcrypt($validatedData['password']);
            }
            $dataUser->user->update($dataUser);
        }

        $employee->update($validatedData);

        return redirect()->route('employees.index')
                        ->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        
        if ($employee->user_id) {
            $employee->user->update([
                'email' => 'deleted_' . $employee->user_id . '_' . $employee->user->email,
            ]);
        }

        $employee->update([
            'status' => 'inactive',
        ]);

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
