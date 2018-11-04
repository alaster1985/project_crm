<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 29; $i++) {
            DB::table('contacts')->insert([
                'communication_tool' => 'mob1',
                'contact' => '8-011-222-33-' . rand(10, 99),
                'person_id' => $i,
                'comment' => rand(10, 29)
                    . ' багов было в коде, один из них пофиксили - осталось '
                    . rand(30, 99)
                    . ' багов в коде',
            ]);
            DB::table('contacts')->insert([
                'communication_tool' => 'skype',
                'contact' => str_random(10),
                'person_id' => $i,
                'comment' => rand(3, 19)
                    . ' багов было в коде, один из них пофиксили - осталось '
                    . rand(41, 79)
                    . ' багов в коде',
            ]);
        }
    }
}
