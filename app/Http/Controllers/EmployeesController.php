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

        $all_employees = DB::table('persons')
            ->select('persons.id','persons.name','persons.address as personsAddress','positions.position','directions.direction','it_companies.company_name','alevel_members.ASPT','alevel_members.comment as alevelcomment')
            ->join('alevel_members', 'alevel_members.id', '=', 'persons.id')
            ->leftJoin('positions', 'alevel_members.position_id', '=', 'positions.id')
            ->leftJoin('directions', 'alevel_members.direction_id', '=', 'directions.id')
            ->leftJoin('it_companies', 'alevel_members.company_id', '=', 'it_companies.id')
            ->paginate(8);

        return view('employees', ['all_employees' => $all_employees]);
/*
        $all_employees = DB::table('persons')->paginate(8);;
//        return view('employees', ['all_employees' => $all_employees]);

        $groups = DB::table('groups')->paginate(8);;
        $directions = DB::table('directions')->paginate(8);;
        return view('employees', ['all_employees' => $all_employees,
            'directions' => $directions,
            'groups' => $groups,]);
*/


    }

    public function emploeePersonaView($id)
    {
        $emploeeView = DB::table('alevel_members')
            ->Join('persons', 'alevel_members.person_id', '=', 'persons.id')
            ->join('contact_persons','contact_persons.person_id','=','persons.id')
            ->where('contact_persons.person_id', '=', $id)
            ->first();
        return view('emploeePersona', ['emploeeView' => $emploeeView]);
//        $emploeeView = DB::table('person')->where('id_person', '=', $id)->first();
//        return view('emploeePersona', ['emploeeView' => $emploeeView]);
    }



}
