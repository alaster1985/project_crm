<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 01.10.2018
 * Time: 11:49
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Person;
use App\Student;
use App\Contact;
use App\Skill_group;

class AddStudentController extends Controller
{
//    public function addStudent(Request $request)
//    {
//        DB::transaction(function () use ($request) {
//            $lastPersonId = DB::table('persons')
//                ->insertGetId([
//                    'name' => $request->input('person_name'),
//                    'address' => $request->input('person_address'),
//                ]);
//            DB::table('students')
//                ->insert([
//                    'person_id' => $lastPersonId,
//                    'group_id' => $request->input('group_id'),
//                    'learning_status' => $request->input('learning_status'),
//                    'employment_status' => $request->input('employment_status'),
//                    'member_id' => $request->input('member_id'),
//                    'company_id' => $request->input('company_id'),
//                    'position_id' => $request->input('position_id'),
//                    'CV' => basename($_FILES["file"]["name"]),
//                    'comment' => $request->input('student_comment'),
//                ]);
//            DB::table('contacts')
//                ->insert([
//                    'person_id' => $lastPersonId,
//                    'communication_tool' => $request->input('communication_tool'),
//                    'contact' => $request->input('contact'),
//                    'comment' => $request->input('contact_comment'),
//                ]);
//            DB::table('skill_groups')
//                ->insert([
//                    'person_id' => $lastPersonId,
//                    'skill_id' => $request->input('skill_id'),
//                ]);
//        });
//        return redirect()->back();
//    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $person = new Person();
            $person->name = $request->person_name;
            $person->address = $request->person_address;
            $person->save();
            $student = new Student();
            $student->person_id = $person->id;
            $student->group_id = $request->group_id;
            $student->learning_status = $request->learning_status;
            $student->employment_status = $request->employment_status;
            $student->member_id = $request->member_id;
            $student->company_id = $request->company_id;
            $student->position_id = $request->position_id;
            $student->CV = basename($_FILES["file"]["name"]);
            $student->comment = $request->student_comment;
            $student->save();
            $contact = new Contact();
            $contact->person_id = $person->id;
            $contact->communication_tool = $request->communication_tool;
            $contact->contact = $request->contact;
            $contact->comment = $request->contact_comment;
            $contact->save();
            $skill_group = new Skill_group();
            $skill_group->person_id = $person->id;
            $skill_group->skill_id = $request->skill_id;
            $skill_group->save();
        });
        return redirect()->back();
    }
}
