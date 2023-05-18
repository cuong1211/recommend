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
            'name' => 'ninhha',
            'email' => 'ninh122001@gmail.com',
            'password' => Hash::make('123456789'),

        ]);
        // DB::table('users')->insert([
        //     'name' => 'Ha Ninh',
        //     'email' => 'ninhha@ntu.com',
        //     'password' => Hash::make('ninh1234'),
        //     'isAdmin' => '0',

        // // ]);
        // for ($i = 1; $i <= 100; $i++) {
        //     for ($j = 1; $j <= 38; $j++) {
        //         DB::table('user_product')->insert([
        //             'user_id' => $i,
        //             'product_id' => $j,
        //             'rate' => rand(1, 5)

        //         ]);
        //     }
        // }
    }
}
