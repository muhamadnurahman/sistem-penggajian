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
        $employees = Employee::first();

        Kasbon::create([
            'employee_id' => $employees->id,
            'amount' => 15000,
            'description' => 'benerin ban motor bocor di bengkel',
            'status' => 'pending',
            'is_paid' => false,
            'date' => '2026-04-01',
        ]);

        Kasbon::create([
            'employee_id' => $employees->id,
            'amount' => 25000,
            'description' => 'ongkos pulang',
            'status' => 'pending',
            'is_paid' => false,
            'date' => '2026-01-20',
        ]);

        Kasbon::create([
            'employee_id' => $employees->id,
            'amount' => 100000,
            'description' => 'beli monitor baru',
            'status' => 'pending',
            'is_paid' => false,
            'date' => '2026-02-15',
        ]);
    }
}
