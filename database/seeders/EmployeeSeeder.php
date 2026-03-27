<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departement = Department::first();

        Employee::create([
            'name' => 'Nur Rachman',
            'email' => 'nurachman@example.com',
            'department_id' => $departement->id,
        ]);

        Employee::create([
            'name' => 'adit',
            'email' => 'adit@example.com',
            'department_id' => $departement->id,
        ]);
        Employee::create([
            'name' => 'deril',
            'email' => 'deril@example.com',
            'department_id' => $departement->id,
        ]);

    }
}
