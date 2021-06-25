<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
                'id'              => 1,
                'name'              => 'Monika - Admin',
                'username'        => 'admin123',
                'email'             => 'admin@monika.com',
                'password'        => bcrypt('admin123'),
                'gambar'            => NULL,
                'level'            => 'Admin',
                'remember_token'    => NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
            [
                'id'              => 2,
                'name'              => 'Monika - Perawat',
                'username'        => 'perawat123',
                'email'             => 'perawat@monika.com',
                'password'        => bcrypt('perawat123'),
                'gambar'            => NULL,
                'level'            => 'Perawat',
                'remember_token'    => NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
            ],
        ]);
    }
}
