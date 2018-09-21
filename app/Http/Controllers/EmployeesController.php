<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{

    public function addEmployee(Request $request)
    {
        $new = $request->input('employee_name');
        return redirect()->route('show.employees');




    }

    public function showEmployees()
    {
//        $all_students = DB::table('students_entity')
//            ->leftJoin('person', 'students_entity.id_person', '=', 'person.id_person')
//            ->get();
//        return view('students', ['all_students'=>$all_students]);

        $all_employees = DB::table('person')->paginate(8);;
        return view('employees', ['all_employees' => $all_employees]);

    }
}
