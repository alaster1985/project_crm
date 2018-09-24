<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position = ['admin', 'PHP_developer', 'JS_developer', 'director', 'HR_manager', 'Sales', 'Project_Manager', 'Teacher'];
        foreach ($position as $value){
            DB::table('positions')->insert([
                'position' => $value,
            ]);
        }
    }
}
