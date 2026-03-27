<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payroll;
use App\Models\Employee;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = Employee::first();

        Payroll::create([
            'employee_id' => $employee->id,
            'salary' => 5000000,
            'bonuses' => 1000000,
            'deductions' => 500000,
            'net_salary' => 5500000,
            'pay_date' => now(),
        ]);

        Payroll::create([
            'employee_id' => $employee->id,
            'salary' => 6000000,
            'bonuses' => 1500000,
            'deductions' => 700000,
            'net_salary' => 6800000,
            'pay_date' => now(),
        ]);

        Payroll::create([
            'employee_id' => $employee->id,
            'salary' => 5500000,
            'bonuses' => 1200000,
            'deductions' => 600000,
            'net_salary' => 6100000,
            'pay_date' => now(),
        ]);
    }
}
