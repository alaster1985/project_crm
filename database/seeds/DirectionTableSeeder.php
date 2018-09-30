<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $direction = ['backend', 'frontend', 'fullStack', 'sales', 'PM', 'design'];
        foreach ($direction as $value){
            DB::table('directions')->insert([
                'direction' => $value,
            ]);
        }
    }
}
