<?php

use Illuminate\Database\Seeder;

class EmpolymentStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employment_students')->insert([
            'company_id' => '1',
            'comment' => 'какой-то полезный текст для инфо',
            'student_id' => '2',
        ]);

        DB::table('employment_students')->insert([
            'company_id' => '2',
            'comment' => 'тут второе место, где снова может быть Ваша реклама!',
            'student_id' => '4',
        ]);
    }
}
