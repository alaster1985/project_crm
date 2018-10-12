<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
//    public function addStudent(Request $request)
//    {
//        $new = $request->input('student_name');
//        DB::table('persons')->insert(['name'=> $request->input('student_name')]);
//        return redirect()->back();
//        return redirect()->route('ShowAllStudents');
//    }

    public function showStudents()
    {
        $all_students = DB::table('persons')
            ->select('persons.id', 'persons.name', 'groups.group_name', 'students.learning_status', 'students.employment_status', 'students.comment')
            ->join('students', 'students.person_id', '=', 'persons.id')
            ->leftJoin('groups', 'groups.id', '=', 'students.group_id')
            ->orderByDesc('students.created_at')
            ->paginate(8);
        return view('students', ['all_students' => $all_students]);
    }

    public function studentPersonaView($id)
    {
        $company = DB::table('persons')
            ->select('stack_name')
            ->join('students', 'persons.id', '=', 'students.person_id')
            ->join('employment_students', 'employment_students.student_id', '=', 'students.id')
            ->join('it_companies', 'it_companies.id', '=', 'employment_students.company_id')
            ->join('stack_groups','stack_groups.company_id','=','it_companies.id')
            ->join('stacks','stack_groups.stack_id','=','stacks.id')
            ->where('students.person_id', '=', $id)
            ->get();

        $skill = DB::table('persons')
            ->select('skill_name')
            ->join('students', 'persons.id', '=', 'students.person_id')
            ->join('skill_groups', 'skill_groups.person_id', '=', 'persons.id')
            ->join('skills', 'skill_groups.skill_id', '=', 'skills.id')
            ->where('students.person_id', '=', $id)
            ->get();

        $group = DB::table('persons')
            ->select('group_name', 'learning_status', 'employment_status', 'direction', 'start_date', 'finish_date', 'homecoming_date')
            ->join('students', 'persons.id', '=', 'students.person_id')
            ->Join('groups', 'groups.id', '=', 'students.group_id')
            ->join('directions', 'groups.direction_id', '=', 'directions.id')
            ->where('students.person_id', '=', $id)
            ->get();

        $contact = DB::table('persons')
            ->select('communication_tool', 'contact', 'contacts.comment')
            ->join('contacts', 'persons.id', '=', 'contacts.person_id')
            ->join('students', 'persons.id', '=', 'students.person_id')
            ->where('students.person_id', '=', $id)
            ->get();

        $student = DB::table('persons')
            ->select('name', 'persons.address', 'CV','company_name','position','students.comment')
            ->Join('contacts', 'persons.id', '=', 'contacts.person_id')
            ->join('students', 'persons.id', '=', 'students.person_id')
            ->leftjoin('employment_students', 'employment_students.student_id', '=', 'students.id')
            ->leftjoin('it_companies', 'it_companies.id', '=', 'students.company_id')
            ->leftjoin('positions', 'students.position_id', '=', 'positions.id')
            ->where('students.person_id', '=', $id)
            ->first();
        return view('studentPersona', ['student' => $student, 'contact' => $contact, 'group' => $group, 'skill' => $skill, 'company' => $company]);
//        $studentView = DB::table('person')->where('id_person', '=', $id)->first();
//        return view('studentPersona', ['studentView' => $studentView]);
    }

    public function studentAddDataName(Request $request)
    {
        DB::table('persons')
            ->where('id', $request->id)
            ->update([
                'name' => $request->field
            ]);
        return back();
    }

    public function studentChangeGroup(Request $request)
    {
        DB::table('students')
            ->where('id', $request->id)
            ->update([
                'group_id' => $request->field
            ]);
        return back();
    }

    public function studentChangeLearnStatus(Request $request)
    {
        DB::table('students')
            ->where('id', $request->id)
            ->update([
                'learning_status' => $request->field
            ]);
        return back();
    }

}