<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactPersonEntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_person_entity')->insert([
            'comment' => 'Рубаха-парень!',
            'id_person' => '10',
            'id_position' => '7',
            'id_direction' => '3',
            'id_company' => '1',
        ]);
        DB::table('contact_person_entity')->insert([
            'comment' => '88005553535 лучше позвонить чем у кого-то занимать',
            'id_person' => '9',
            'id_position' => '5',
            'id_direction' => '3',
            'id_company' => '2',
        ]);
    }
}
