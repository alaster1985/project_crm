<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Class TasksController extends Controller
{

    public function showTasks()
    {
        $all_tasks = DB::table('tasks')
            ->select('tasks.id as id','task_name','description','dead_line','name','task_completed','doers_report')
            ->join('persons','persons.id', '=', 'tasks.user_id_customer')

        //    ->join('persons', 'tasks.user_id_customer', '=', 'persons.id')
        //   ->where('tasks.user_id_doer','=','persons.id')
            ->paginate(8);
        return view('tasks', ['all_tasks' => $all_tasks]);
    }

    public function tasksView($id)
    {
        $taskView = DB::table('tasks')
            ->where('tasks.id', '=', $id)
            ->first();
        return view('taskView', ['taskView' => $taskView]);
    }
}