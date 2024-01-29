<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'role_user_id'  => 1,
            'password' => Hash::make('superadmin789'),
        ]);

        DB::table('users')->insert([
            'name' => 'User Petugas',
            'email' => 'userpetugas@petugas.com',
            'role_user_id'  => 2,
            'password' => Hash::make('userpetugas789'),
        ]);
    }
}
