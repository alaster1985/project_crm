<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function addStudent(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $originalFileName = $request->file('image')->getClientOriginalName();
                $file->move(public_path() . '/images', $originalFileName);
            }
        }
        $new = $request->input('student_name');
        return redirect()->route('ShowAllStudents');
//        DB::table('person')->insert(['name'=> $request->input('student_name')]);
    }

    public function showStudents()
    {
        $all_students = DB::table('person')->paginate(8);;
        return view('students', ['all_students' => $all_students]);
    }

    public function studentPersonaView($id)
    {

        $studentView = DB::table('contact_info')
            ->leftJoin('person', 'contact_info.id_person', '=', 'person.id_person')
            ->where('contact_info.id_person', '=', $id)
            ->first();
        return view('studentPersona', ['studentView' => $studentView]);

//        $studentView = DB::table('person')->where('id_person', '=', $id)->first();
//        return view('studentPersona', ['studentView' => $studentView]);
    }
}
