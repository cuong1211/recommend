<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Root',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
           
        ]);
        // DB::table('users')->insert([
        //     'name' => 'Ha Ninh',
        //     'email' => 'ninhha@ntu.com',
        //     'password' => Hash::make('ninh1234'),
        //     'isAdmin' => '0',
           
        // ]);
    }
}
