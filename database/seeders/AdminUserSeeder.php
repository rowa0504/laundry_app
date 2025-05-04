<?php

namespace Database\Seeders;

// database/seeders/AdminUserSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // UserモデルがApp\Modelsにある前提

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // 仮パスワード
            'role_id' => 1, // ← これがadmin
        ]);
    }
}

