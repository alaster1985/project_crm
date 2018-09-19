<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Db_controller extends Controller
{
    public function add(Request $request)
    {
        $new = $request->input('student_name');
        return view('students');
//        return view('students', ['error' => $error]);
    }

    public function show_students()
    {
//        $all_students = DB::table('students_entity')
//            ->leftJoin('person', 'students_entity.id_person', '=', 'person.id_person')
//            ->get();
//        return view('students', ['all_students'=>$all_students]);

        $all_students = DB::table('person')->paginate(2);;

//              $all_students = ["qq"=> 5, "qa"=> 4, "q"=> 57];

        return view('students', ['all_students'=> $all_students]);


  }
}
