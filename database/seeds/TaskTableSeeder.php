<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'task_name' => 'ticket1',
            'description' => 'выполнить первый тикет',
            'dead_line' => '2018-12-20',
            'user_id_customer' => '2',
            'user_id_doer' => '3',
            'doers_report' => 'тикет 1 выполнен',
            'task_completed' => '1',
        ]);
        DB::table('tasks')->insert([
            'task_name' => 'ticket2',
            'description' => 'выполнить второй тикет',
            'dead_line' => '2018-11-29',
            'user_id_customer' => '2',
            'user_id_doer' => '4',
            'doers_report' => 'тикет 2 выполнен',
            'task_completed' => '1',
        ]);
        DB::table('tasks')->insert([
            'task_name' => 'ticket3',
            'description' => 'выполнить третий тикет',
            'dead_line' => '2018-11-19',
            'user_id_customer' => '5',
            'user_id_doer' => '2',
        ]);
    }
}
