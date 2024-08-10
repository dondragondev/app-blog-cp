<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role_code' => 'SA',
            'desc' => 'Superadmin'
        ]);
        
        Role::create([
            'role_code' => 'A',
            'desc' => 'Admin'
        ]);
        
        Role::create([
            'role_code' => 'U',
            'desc' => 'User'
        ]);
        Role::create([
            'role_code' => 'CS',
            'desc' => 'Customer Services'
        ]);
        Role::create([
            'role_code' => 'M',
            'desc' => 'Marketing'
        ]);
        Role::create([
            'role_code' => 'O',
            'desc' => 'Operator'
        ]);

    }
}
