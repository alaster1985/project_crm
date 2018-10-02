<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentEntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 6; $i++){
            DB::table('students')->insert([
                'learning_status' => ['graduated', 'fell_of'][rand(0,1)],
                'employment_status' => ['employed', 'in_search', 'not_relevant_in_IT', 'refused', 'in_IT_not_in_direction'][rand(0,4)],
                'CV' => 'путь к файлу резюмъе группы хищников',
                'comment' => 'первая пословица, которая вспомнится №' . $i,
                'person_id' => (17+$i),
                'group_id' => '1',
                'member_id' => rand(2,3),
                'company_id' => rand(1,2),
                'position_id' => rand(1,7),
            ]);
        }
        for($i = 1; $i <= 6; $i++){
            DB::table('students')->insert([
                'learning_status' => ['learning', 'fell_of'][rand(0,1)],
                'employment_status' => 'in_search',
                'CV' => 'путь к файлу резюмъе группы рыб',
                'comment' => 'вторая пословица, которая вспомнится №' . $i,
                'person_id' => (23+$i),
                'group_id' => '2',
                'member_id' => NULL,
                'company_id' => NULL,
                'position_id' => NULL,
            ]);
        }
    }
}
