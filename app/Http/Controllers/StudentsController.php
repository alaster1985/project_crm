<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageValidation;
use Illuminate\Support\Facades\DB;


class StudentsController extends Controller
{
    public function addStudent(ImageValidation $request)
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
//        DB::table('persons')->insert(['name'=> $request->input('student_name')]);
    }

    public function showStudents()
    {
        $all_students = DB::table('persons')->paginate(8);
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
