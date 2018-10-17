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
//    public function addEmployee(Request $request)
//    {
//        DB::transaction(function () use ($request) {
//            $lastPersonId = DB::table('persons')
//                ->insertGetId([
//                    'name' => $request->input('person_name'),
//                    'address' => $request->input('person_address'),
//                ]);
//            DB::table('alevel_members')
//                ->insert([
//                    'person_id' => $lastPersonId,
//                    'position_id' => $request->input('position_id'),
//                    'direction_id' => $request->input('direction_id'),
//                    'company_id' => $request->input('company_id'),
//                    'comment' => $request->input('employee_comment'),
//                    'ASPT' => $request->input('ASPT'),
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
            $alevel_member = new Alevel_member();
            $alevel_member->person_id = $person->id;
            $alevel_member->position_id = $request->position_id;
            $alevel_member->direction_id = $request->direction_id;
            $alevel_member->company_id = $request->company_id;
            $alevel_member->comment = $request->employee_comment;
            $alevel_member->ASPT = $request->ASPT;
            $alevel_member->save();
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
