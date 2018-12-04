<?php

namespace App\Http\Controllers;

use App\Alevel_member;
use App\Http\Requests\StoreCurrentEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddCurrentEmployeeController extends Controller
{
    public function index($person)
    {
        $person = DB::table('persons')->find($person);
        $skills_id = DB::table('skill_groups')
            ->get()
            ->where('person_id', '=', $person->id)
            ->pluck('skill_id')
            ->toArray();
        $skills = [];
        foreach ($skills_id as $skill_id) {
            $skill_name = DB::table('skills')
                ->get()
                ->where('id', '=', $skill_id)
                ->pluck('skill_name')
                ->toArray();
            array_push($skills, $skill_name[0]);
        }
        $contacts = DB::table('contacts')
            ->get()
            ->where('person_id', '=', $person->id)
            ->toArray();

        $mob1 = $mob2 = $email = $skype = $other = [
            'contact' => '',
            'comment' => '',
        ];
        $params = [
            'mob1' => $mob1,
            'mob2' => $mob2,
            'email' => $email,
            'skype' => $skype,
            'other' => $other
        ];
        foreach ($contacts as $contact) {
            foreach ($params as $key => $value) {
                if ($contact->communication_tool === $key) {
                    $params[$key] = [
                        'contact' => $contact->contact,
                        'comment' => $contact->comment,
                    ];
                }
            }
        }

        $companies = DB::table('it_companies')->get();
        $positions = DB::table('positions')->get();
        $directions = DB::table('directions')->get();

        return view('addcurrentemployee', [
            'person' => $person->id,
            'name' => $person->name,
            'address' => $person->address,
            'skills' => implode(", ", $skills),
            'companies' => $companies,
            'positions' => $positions,
            'directions' => $directions,
            'mob1_contact' => $params['mob1']['contact'],
            'mob1_comment' => $params['mob1']['comment'],
            'mob2_contact' => $params['mob2']['contact'],
            'mob2_comment' => $params['mob2']['comment'],
            'email_contact' => $params['email']['contact'],
            'email_comment' => $params['email']['comment'],
            'skype_contact' => $params['skype']['contact'],
            'skype_comment' => $params['skype']['comment'],
            'other_contact' => $params['other']['contact'],
            'other_comment' => $params['other']['comment'],
        ]);
    }

    public function store(StoreCurrentEmployee $request, $person)
    {
        DB::transaction(function () use ($request, $person) {
            $alevel_Member = new Alevel_member($request->toArray());
            $alevel_Member->person_id = $person;
            $alevel_Member->comment = $request->employee_comment;
            $alevel_Member->save();
        });
        return redirect()->route('show.employees')->with('message', 'DONE!');
    }
}
