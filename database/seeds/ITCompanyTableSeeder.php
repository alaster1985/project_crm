<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ITCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('it_companies')->insert([
            'company_name' => 'brilliant',
            'status' => 'Партнеры',
            'type' => 'Трудоустройство',
            'site' => 'какой-то сайт на укозе',
            'address' => 'где-то в центре Харькова',
            'logo' => 'тут путь к файлу лого1',
            'comment' => 'какой-то полезный текст',
        ]);
        DB::table('it_companies')->insert([
            'company_name' => 'Topaz',
            'status' => 'Потенциальные',
            'type' => 'Отсутствует',
            'site' => 'какой-то сайт на третьей воде на киселе',
            'address' => 'где-то в Дергачах',
            'logo' => 'тут путь к файлу лого2',
            'comment' => 'тут может быть Ваша реклама!',
        ]);
    }
}
