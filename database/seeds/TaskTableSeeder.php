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
        DB::table('task')->insert([
            'task_name' => 'ticket1',
            'description' => 'выполнить первый тикет',
            'dead_line' => '2018-12-20',
            'id_member_customer' => '12',
            'id_member_doer' => '13',
            'doers_report' => 'тикет 1 выполнен',
            'task_completed' => '1',
        ]);
        DB::table('task')->insert([
            'task_name' => 'ticket2',
            'description' => 'выполнить второй тикет',
            'dead_line' => '2018-11-29',
            'id_member_customer' => '12',
            'id_member_doer' => '14',
            'doers_report' => 'тикет 2 выполнен',
            'task_completed' => '1',
        ]);
        DB::table('task')->insert([
            'task_name' => 'ticket3',
            'description' => 'выполнить третий тикет',
            'dead_line' => '2018-11-19',
            'id_member_customer' => '15',
            'id_member_doer' => '12',
        ]);
    }
}
