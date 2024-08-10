<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Catagory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RoleSeeder::class, UserSeeder::class]);
        User::factory(20)->create();
        
        Catagory::create([
            'name' => 'Progaming',
            'slug' => 'progaming'
        ]);

        Catagory::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Catagory::create([
            'name' => 'Mobile App',
            'slug' => 'mobile-app'
        ]);

        Post::factory(40)->create();    }
}
