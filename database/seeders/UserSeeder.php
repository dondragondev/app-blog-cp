<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'username'=>'super_admin',
            'email' => 'superadmin@app.com',
            'role'=> 1,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
       ]);
       User::create([
            'name' => 'Admin',
            'username'=>'admin',
            'email' => 'admin@app.com',
            'role'=> 2,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
       ]);
       User::create([
        'name' => 'User Test',
        'username'=>'usertest',
        'email' => 'usertest@app.com',
        'role'=> 3,
        'email_verified_at' => now(),
        'password' => Hash::make('password'),
   ]);
    }
}
