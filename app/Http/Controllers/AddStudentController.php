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
            foreach ($request->contacts as $value) {
                if (empty($value['contact'])) {
                    continue;
                }
                $contact = new Contact($value);
                $contact->person_id = $person->id;
                $contact->save();
            };
            foreach ($request->skill_id as $value) {
                if (is_null($value)) {
                    continue;
                }
                $skill_Group = new Skill_group();
                $skill_Group->person_id = $person->id;
                $skill_Group->skill_id = $value;
                $skill_Group->save();
            }
        });
        return redirect()->back();
    }
}
