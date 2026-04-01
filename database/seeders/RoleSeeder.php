<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Admin',
            'description' => 'Memiliki akses penuh ke semua fitur dan data dalam sistem penggajian.',
            'redirect_to' => 'dashboard',
        ]);

        Role::create([
            'name' => 'HRD',
            'description' => 'Bertanggung jawab untuk mengelola data karyawan, penggajian, dan laporan keuangan.',
            'redirect_to' => 'dashboard',
        ]);

        Role::create([
            'name' => 'Employee',
            'description' => 'Dapat melihat informasi gaji mereka sendiri dan mengajukan permintaan kasbon.',
            'redirect_to' => 'employee.dashboard',
        ]);
    }
}
