<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            'id' => '539',
            'nama' => 'super admin',
            'email' => 'admin@mokita.com',
            'role' => 'crud-list',
            'password' => Hash::make('E5kAfX8cB&5^')
        ]);
    }
}
