<?php
namespace App\Http\Controllers;
use App\Http\Requests\ImageValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class StudentsController extends Controller
{
    public function addStudent(Request $request)
    {
        $new = $request->input('student_name');
//        DB::table('persons')->insert(['name'=> $request->input('student_name')]);
        return redirect()->back();
//        return redirect()->route('ShowAllStudents');
    }

    public function showStudents()
    {
        $all_students = DB::table('persons')
            ->join('students', 'students.id', '=', 'persons.id')
            ->leftJoin('groups', 'groups.id', '=', 'students.group_id')
            ->paginate(8);
        return view('students', ['all_students' => $all_students]);
    }
    public function studentPersonaView($id)
    {
        $studentView = DB::table('contacts')
            ->leftJoin('persons', 'contacts.person_id', '=', 'persons.id')
            ->where('contacts.person_id', '=', $id)
            ->first();
        return view('studentPersona', ['studentView' => $studentView]);
//        $studentView = DB::table('person')->where('id_person', '=', $id)->first();
//        return view('studentPersona', ['studentView' => $studentView]);
    }
}

