<?php

namespace App\Http\Controllers;

use App\Services\UploadCVService;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddCurrentStudentController extends Controller
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
        $studgr = DB::table('students')
            ->where('person_id', '=', $person->id)
            ->get(['group_id'])
            ->pluck('group_id')
            ->toArray();

        $groups = DB::table('groups')
            ->get(["group_name", 'id'])
            ->pluck("group_name", 'id')
            ->toArray();

        foreach ($studgr as $val) {
            $gr = DB::table('groups')
                ->get(["group_name", 'id'])
                ->where('id', '=', $val)
                ->pluck("group_name", 'id')
                ->toArray();
            $groups = array_diff_key($groups, $gr);
        }

        return view('addcurrentstudent', [
            'person' => $person->id,
            'name' => $person->name,
            'address' => $person->address,
            'skills' => implode(", ", $skills),
            'groups' => $groups,
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

    protected $uploadFile;

    public function store(Request $request, $person)
    {
        DB::transaction(function () use ($request, $person) {
            $student = new Student($request->toArray());
            $student->person_id = $person;
            if (!is_null($request->file)) {
                $this->uploadFile = new UploadCVService();
                $this->uploadFile->upload($request);
                $student->CV = $this->uploadFile->pathForCV . '/' . $this->uploadFile->newCVName;
            } else {
                $student->CV = null;
            }
            $student->comment = $request->student_comment;
            $student->save();
        });
        return redirect()->back();
    }
}
