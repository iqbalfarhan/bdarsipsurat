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
        $datas = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => Hash::make('adminoke'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User demo tester',
                'username' => 'user',
                'password' => Hash::make('useroke'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach($datas as $data){
            $user = User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'password' => $data['password'],
                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],
            ]);
            $user->assignRole($data['role']);
        }
    }
}
