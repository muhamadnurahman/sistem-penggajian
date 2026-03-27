<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name' => 'Web Development',
            'description' => 'Membuat dan memelihara situs web perusahaan.',
        ]);
        Department::create([
            'name' => 'Mobile Development',
            'description' => 'Membuat dan memelihara aplikasi mobile perusahaan.',
        ]);
        Department::create([
            'name' => 'Marketing',
            'description' => 'Mempromosikan produk dan layanan perusahaan untuk meningkatkan penjualan.',
        ]);
    }
}
