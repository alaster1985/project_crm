<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StackPivotTableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stack1 = [1, 2, 3, 5];
        foreach ($stack1 as $value) {
            DB::table('stack_groups')->insert([
                'stack_id' => $value,
                'company_id' => '1',
                'comment' => 'какой-то коммент для компании №1 для стэка ' . $value,
            ]);
        }
        $stack2 = [1, 4, 5];
        foreach ($stack2 as $value) {
            DB::table('stack_groups')->insert([
                'stack_id' => $value,
                'company_id' => '2',
                'comment' => 'какой-то коммент для компании №2 для стэка ' . $value,
            ]);
        }
    }
}
