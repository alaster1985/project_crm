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
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $person = new Person($request->toArray());
            $person->save();
            $student = new Student($request->toArray());
            $student->person_id = $person->id;
            $student->CV = basename($_FILES["file"]["name"]);
            $student->comment = $request->student_comment;
            $student->save();
            $contact = new Contact($request->toArray());
            $contact->person_id = $person->id;
            $contact->comment = $request->contact_comment;
            $contact->save();
            $skill_Group = new Skill_group($request->toArray());
            $skill_Group->person_id = $person->id;
            $skill_Group->save();
        });
        return redirect()->back();
    }
}
