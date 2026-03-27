<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departement = Department::first();
        $user = User::first();
        $role = Role::first();

        Employee::create([
            'user_id' => $user->id,
            'role_id' => $role->id,
            'department_id' => $departement->id,
            'name' => 'Nur Rachman',
            'email' => 'nurachman@example.com',
            'phone_number' => '081234567890',
            'address' => 'Jl. pramuka no 123',
            'hire_date' => '2026-01-01',
            'salary' => 5000000,
            'status' => 'active',
        ]);
    }
}
