<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageValidation;
use App\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Class TasksController extends Controller
{

    public function showTasks()
    {
        $doer = DB::table('tasks')
            ->select('tasks.id as id','name')
            ->join('users', 'users.id', '=', 'tasks.user_id_doer')
            ->get();

        $all_tasks = DB::table('tasks')
            ->select('tasks.id as id', 'task_name', 'description', 'dead_line', 'name as customerName', 'task_completed', 'doers_report')
            ->join('users', 'users.id', '=', 'tasks.user_id_customer')
            //    ->join('persons', 'tasks.user_id_customer', '=', 'persons.id')
            //   ->where('tasks.user_id_doer','=','persons.id')
            ->paginate(8);
        return view('tasks', ['all_tasks' => $all_tasks, 'doer' => $doer]);
    }

    public function tasksView($id)
    {
        $taskView = DB::table('tasks')
            ->where('tasks.id', '=', $id)
            ->first();
        return view('taskView', ['taskView' => $taskView]);
    }

    public function allTasks()
    {
        $tasks = DB::table('tasks')
            ->select('tasks.id', 'task_name', 'description', 'dead_line', 'users.name as customerName', 'us.name as doerName','task_completed', 'doers_report')
            ->join('users', 'users.id', '=', 'tasks.user_id_customer')
            ->join('users as us', 'us.id', '=', 'tasks.user_id_doer')
            ->get();
        return response()->json($tasks);
    }

    public function getTaskInfo(Request $request){
        $tasks= Task::where('id', $request->key)
            ->get();
        return response($tasks);
    }




}