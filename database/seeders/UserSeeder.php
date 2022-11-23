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
            'nama' => 'super admin',
            'email' => 'oned',
            'password' => Hash::make('123456')
        ]);
    }
}
