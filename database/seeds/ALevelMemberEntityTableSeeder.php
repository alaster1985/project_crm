<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ALevelMemberEntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alevel_member_entity')->insert([
            'id_person' => '10',
            'id_position' => '5',
            'id_direction' => '3',
            'id_company' => '2',
            'comment' => 'Молодчик!',
            'ASPT' => '1',
        ]);
        for($i = 1; $i <=6; $i++){
            DB::table('alevel_member_entity')->insert([
                'id_person' => (11 + $i),
                'id_position' => '8',
                'id_direction' => rand(1,3),
                'id_company' => rand(1,2),
                'comment' => 'Крутой препод с IQ ' . rand(120, 140),
                'ASPT' => '0',
            ]);
        }
    }
}
