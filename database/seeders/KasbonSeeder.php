<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kasbon;
use App\Models\Employee;

class KasbonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = Employee::first();

        Kasbon::create([
            'employee_id' => $employee->id,
            'amount' => 500000,
            'description' => 'buat beli mouse baru',
            'status' => 'pending',
            'date' => now(),
        ]);

        Kasbon::create([
            'employee_id' => $employee->id,
            'amount' => 300000,
            'description' => 'buat beli keyboard baru',
            'status' => 'approved',
            'date' => now(),
        ]);

        Kasbon::create([
            'employee_id' => $employee->id,
            'amount' => 200000,
            'description' => 'buat beli kursi baru',
            'status' => 'rejected',
            'date' => now(),
        ]);
    }
}
