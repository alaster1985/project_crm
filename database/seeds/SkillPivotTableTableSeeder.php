<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillPivotTableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 6; $i++) {
            foreach ([1,2,7,8,9,10] as $value){
                DB::table('skill_pivot_table')->insert([
                    'id_person' => (17 + $i),
                    'id_skill' => $value,
                ]);
            }
        }
        for($i = 1; $i <= 6; $i++) {
            foreach ([2,7,8] as $value){
                DB::table('skill_pivot_table')->insert([
                    'id_person' => (23 + $i),
                    'id_skill' => $value,
                ]);
            }
        }
        for($i = 1; $i <= 6; $i++) {
            for($j = 1; $j <= 12; $j++){
                DB::table('skill_pivot_table')->insert([
                    'id_person' => (11 + $i),
                    'id_skill' => $j,
                ]);
            }
        }
    }
}
