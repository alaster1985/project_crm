<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = ['PHP', 'JS', 'Java', 'sales', 'Python', 'Ruby', 'HTML', 'CSS', 'SQL', 'linux', 'HR', 'management'];
        foreach ($skills as $value){
            DB::table('skill')->insert([
                'skill_name' => $value,
            ]);
        }
    }
}
