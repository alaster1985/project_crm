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
        $users = ['Pavel_K', 'Igor_B', 'Alex_S', 'Andry_S', 'Evgeniya_S', 'User_U'];
        foreach ($users as $value) {
            DB::table('users')->insert([
                'name' => $value,
                'email' => $value . '@gmail.com',
                'password' => bcrypt($value . '123'),
            ]);
        }
        DB::table('users')->insert([
            'name' => 'Pavel',
            'email' => 'karaspavel010' . '@gmail.com',
            'password' => bcrypt('111222rR'),
        ]);
    }
}
