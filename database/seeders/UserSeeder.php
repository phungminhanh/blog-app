<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Tạo 5 người dùng có vai trò admin
        User::factory(5)->create([
            'role' => 'admin',
            'password' => bcrypt('123'),
            'email' => 'admin@example.com', // Thêm giá trị cho trường email
        ]);

        // Tạo 5 người dùng có vai trò user
        User::factory(5)->create([
            'role' => 'user',
            'password' => bcrypt('123'),
            'email' => 'user@example.com', // Thêm giá trị cho trường email
        ]);
    }
}
