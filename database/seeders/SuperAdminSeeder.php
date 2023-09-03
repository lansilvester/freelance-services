<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'), // Ganti 'password' dengan password yang diinginkan
            'foto_profil' => 'admin.jpg',
            'role' => 'super_admin',
            'id' => 1,
        ]);
    }
}
