<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'nguyenductri1h1@mail.com',
                'password' => Hash::make('admin123'),
                'level' => 0
            ],
            [
                'name' => 'admin1',
                'email' => 'nguyenductri.nina@gmail.com',
                'password' => Hash::make('admin123'),
                'level' => 0
            ]
        ]);
    }
}
