<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);

        User::create([
            'fullname' => 'Admin Test',
            'email' => 'admin@gmail.com',
            'role_id' => 1, 
            'password' => bcrypt('Password@12345'),
        ]);
    }
}
