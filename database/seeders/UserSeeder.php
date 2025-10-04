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
        User::updateOrCreate(
            ['email' => 'mohamed.ibrahim@gmail.com'],
            [
                'name' => 'Mohamed Ibrahim',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '01175120011',
                'address' => 'Cairo, Egypt',
                'usertype' => 1,
            ]
        );
    }
}
