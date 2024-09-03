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
        $user = User::insert([
            'email' => 'fariz@admin.com',
            'username' => 'fariz123',
            'password' => Hash::make('12345678'),
            'firstname' => 'Fariz',
            'lastname' => 'Zulf'
        ]);
    }
}
