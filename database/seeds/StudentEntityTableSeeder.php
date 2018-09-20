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
            DB::table('student_entity')->insert([
                'learning_status' => ['graduated', 'fell_of'][rand(0,1)],
                'employment_status' => ['employed', 'in_search', 'not_relevant_in_IT', 'refused', 'in_IT_not_in_direction'][rand(0,4)],
                'CV' => 'путь к файлу резюмъе группы хищников',
                'comment' => 'первая пословица, которая вспомнится №' . $i,
                'id_person' => (17+$i),
                'id_group' => '1',
                'id_member' => rand(2,3),
                'id_company' => rand(1,2),
                'id_position' => rand(1,7),
            ]);
        }
        for($i = 1; $i <= 6; $i++){
            DB::table('student_entity')->insert([
                'learning_status' => ['learning', 'fell_of'][rand(0,1)],
                'employment_status' => 'in_search',
                'CV' => 'путь к файлу резюмъе группы рыб',
                'comment' => 'вторая пословица, которая вспомнится №' . $i,
                'id_person' => (23+$i),
                'id_group' => '2',
                'id_member' => NULL,
                'id_company' => NULL,
                'id_position' => NULL,
            ]);
        }
    }
}
