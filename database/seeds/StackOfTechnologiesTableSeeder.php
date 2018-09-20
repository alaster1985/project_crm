<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StackOfTechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stack = ['i_Shops', 'SQL_support', 'fullStack', 'sales', 'design'];
        foreach ($stack as $value){
            DB::table('stack_of_technologies')->insert([
                'stack_name' => $value,
            ]);
        }
    }
}
