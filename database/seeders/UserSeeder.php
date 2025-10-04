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
        User::insert([
            'name'=> 'Mohamed Ibrahim',
            'email'=> 'mohamedibrahimx37@gmail.com',
            'password'=> Hash::make('12345678'),
            'usertype'=>1,
            'phone'=> '01123624789',
            "address" => "Cairo, Egypt",
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
    }
}
