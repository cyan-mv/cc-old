<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'cyan',
                'email' => 'cyan.mv@gmail.com',
                'password' => bcrypt('toast'),
                'remember_token' => null,
            ],
            [
                'name' => 'agent',
                'email' => 'agent@gmail.com',
                'password' => bcrypt('toast'),
                'remember_token' => null,
            ]
        ];
        User::insert($users);
    }
}
