<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        'fullname' => 'Admin',
        'email' => 'admin@gmail.com',
        'role_id' => 1,
        'password' => Hash::make('Password@12345'),
    ]);

    
    $architects = [
        'Yassine El Amrani',
        'Omar Bennis',
        'Mehdi Tazi',
        'Zakaria Lahlou',
    ];

    foreach ($architects as $index => $name) {
        User::create([
            'fullname' => $name,
            'email' => 'architecte' . ($index + 1) . '@mail.com',
            'role_id' => 2,
            'password' => Hash::make('password'),
        ]);
    }

    
    for ($i = 1; $i <= 25; $i++) {
        User::create([
            'fullname' => 'Client ' . $i,
            'email' => 'client' . $i . '@mail.com',
            'role_id' => 3,
            'password' => Hash::make('password'),
        ]);
    }
}
}
