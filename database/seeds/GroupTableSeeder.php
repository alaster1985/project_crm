<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'group_name' => 'predators',
            'start_date' => '2017-09-01',
            'finish_date' => '2018-03-01',
            'homecoming_date' => '2018-03-21',
            'direction_id' => '1',
        ]);
        DB::table('groups')->insert([
            'group_name' => 'fish',
            'start_date' => '2018-09-01',
            'finish_date' => '2019-03-01',
            'homecoming_date' => '2019-03-21',
            'direction_id' => '2',
        ]);
        DB::table('groups')->insert([
            'group_name' => 'riba',
            'start_date' => '2018-09-01',
            'finish_date' => '2019-03-01',
            'homecoming_date' => '2019-03-21',
            'direction_id' => '2',
        ]);
    }
}
