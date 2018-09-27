<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Pavel_K',
            'email' => 'Pavel_K'.'@gmail.com',
            'password' => bcrypt('Pavel_K123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Igor_B',
            'email' => 'Igor_B'.'@gmail.com',
            'password' => bcrypt('Igor_B123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Alex_S',
            'email' => 'Alex_S'.'@gmail.com',
            'password' => bcrypt('Alex_S123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Andry_S',
            'email' => 'Andry_S'.'@gmail.com',
            'password' => bcrypt('Andry_S123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Evgeniya_S',
            'email' => 'Evgeniya_S'.'@gmail.com',
            'password' => bcrypt('Evgeniya_S123'),
        ]);
        DB::table('users')->insert([
            'name' => 'User_U',
            'email' => 'User_U'.'@gmail.com',
            'password' => bcrypt('User_U123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Pavel',
            'email' => 'karaspavel010'.'@gmail.com',
            'password' => bcrypt('111222rR'),
        ]);
    }
}
