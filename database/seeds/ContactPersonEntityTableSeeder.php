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
        DB::table('contact_persons')->insert([
            'comment' => 'Рубаха-парень!',
            'person_id' => '10',
            'position_id' => '7',
            'direction_id' => '3',
            'company_id' => '1',
        ]);
        DB::table('contact_persons')->insert([
            'comment' => '88005553535 лучше позвонить чем у кого-то занимать',
            'person_id' => '9',
            'position_id' => '5',
            'direction_id' => '3',
            'company_id' => '2',
        ]);
    }
}
