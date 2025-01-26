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
        $users = [
            [
                'name' => 'Rasya Yoga',
                'email' => 'yogafirmansyah@gmail.com',
                'password' => Hash::make('firmansyah'),
                'role' => 'admin',
            ],
            [
                'name' => 'Cisarua2',
                'email' => 'cisarua2@gmail.com',
                'password' => Hash::make('cisarua2'),
                'role' => 'ps',
            ],
            [
                'name' => 'cicurug',
                'email' => 'cicurug@gmail.com',
                'password' => Hash::make('cicurug'),
                'role' => 'ps',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
