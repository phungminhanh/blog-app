<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Import Hash

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'user_name' => 'admin1',
            'password' => Hash::make('admin1'),
            'role' => 'user',
            'stagename' => 'Admin User',
        ]);
        
    }
}
