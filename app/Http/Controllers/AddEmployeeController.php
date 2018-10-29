<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 02.10.2018
 * Time: 17:05
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Person;
use App\Alevel_member;
use App\Contact;
Use App\Skill_group;

class AddEmployeeController extends Controller
{
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $person = new Person($request->toArray());
            $person->save();
            $alevel_Member = new Alevel_member($request->toArray());
            $alevel_Member->person_id = $person->id;
            $alevel_Member->comment = $request->employee_comment;
            $alevel_Member->save();
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
