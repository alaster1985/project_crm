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
        DB::table('alevel_members')->insert([
            'person_id' => '10',
            'position_id' => '5',
            'direction_id' => '3',
            'company_id' => '2',
            'comment' => 'Молодчик!',
            'ASPT' => '1',
        ]);
        for($i = 1; $i <=6; $i++){
            DB::table('alevel_members')->insert([
                'person_id' => (11 + $i),
                'position_id' => '8',
                'direction_id' => rand(1,3),
                'company_id' => rand(1,2),
                'comment' => 'Крутой препод с IQ ' . rand(120, 140),
                'ASPT' => '0',
            ]);
        }
    }
}
