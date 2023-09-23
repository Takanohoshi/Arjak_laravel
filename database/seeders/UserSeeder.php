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
        $data = [
            [
                'name' => 'hosi',
                'username' => 'tamahoshi',
                'email' => 'hosi@gmail.com',
                'password' => Hash::make('1234'), 
                'level' => 'admin',
            ],
            [
                'name' => 'udin',
                'username' => 'saikoji',
                'email' => 'udin@gmail.com',
                'password' => Hash::make('1234'),
                'level' => 'petugas',
            ],
            [
                'name' => 'saki',
                'username' => 'sakiouji',
                'email' => 'saki@gmail.com',
                'password' => Hash::make('1234'),
                'level' => 'petugas',
            ]
            ];
            User::insert($data);
    }
}
