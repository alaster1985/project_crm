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

        $all_employees = DB::table('persons')
            ->select('persons.id','persons.name','persons.address as personsAddress','positions.position','directions.direction','it_companies.company_name','alevel_members.ASPT','alevel_members.comment as alevelcomment')
            ->join('alevel_members', 'alevel_members.id', '=', 'persons.id')
            ->leftJoin('positions', 'alevel_members.position_id', '=', 'positions.id')
            ->leftJoin('directions', 'alevel_members.direction_id', '=', 'directions.id')
            ->leftJoin('it_companies', 'alevel_members.company_id', '=', 'it_companies.id')
            ->paginate(8);

       /* $all_employees = DB::table('it_companies')

            ->rightJoin('alevel_members','alevel_members.company_id','=','it_companies.id')
            ->join('persons','alevel_members.id','=','persons.id')
            ->rightJoin('positions','alevel_members.position_id','=','positions.id')
            ->rightJoin('directions','alevel_members.direction_id','=','it_companies.id')
            ->paginate(8);
       */
        return view('employees', ['all_employees' => $all_employees]);
    }

    public function emploeePersonaView($id)
    {
        $emploeeView = DB::table('contacts')
            ->leftJoin('persons', 'contacts.person_id', '=', 'persons.id')
            ->where('contacts.person_id', '=', $id)
            ->first();
        return view('emploeePersona', ['emploeeView' => $emploeeView]);
//        $emploeeView = DB::table('person')->where('id_person', '=', $id)->first();
//        return view('emploeePersona', ['emploeeView' => $emploeeView]);
    }
}
