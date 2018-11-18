<?php

namespace App\Http\Controllers;

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
        foreach ($contacts as $contact){
            if ($contact->communication_tool === 'mob1'){
                $mob1 = [
                    'contact' => $contact->contact,
                    'comment' => $contact->comment,
                ];
            }
            if ($contact->communication_tool === 'mob2'){
                $mob2 = [
                    'contact' => $contact->contact,
                    'comment' => $contact->comment,
                ];
            }
            if ($contact->communication_tool === 'email'){
                $email = [
                    'contact' => $contact->contact,
                    'comment' => $contact->comment,
                ];
            }
            if ($contact->communication_tool === 'skype'){
                $skype = [
                    'contact' => $contact->contact,
                    'comment' => $contact->comment,
                ];
            }
            if ($contact->communication_tool === 'Other'){
                $other = [
                    'contact' => $contact->contact,
                    'comment' => $contact->comment,
                ];
            }
        }

        return view('addcurrentstudent', [
            'person' => $person->id,
            'name' => $person->name,
            'address' => $person->address,
            'skills' => implode(", ", $skills),
            'mob1_contact' => $mob1['contact'],
            'mob1_comment' => $mob1['comment'],
            'mob2_contact' => $mob2['contact'],
            'mob2_comment' => $mob2['comment'],
            'email_contact' => $email['contact'],
            'email_comment' => $email['comment'],
            'skype_contact' => $skype['contact'],
            'skype_comment' => $skype['comment'],
            'other_contact' => $other['contact'],
            'other_comment' => $other['comment'],
        ]);
    }
    protected $uploadFile;

    public function __construct()
    {
        $this->uploadFile = new UploadCVController();
    }
    public function store(Request $request, $person)
    {
//        dd($request, $person);
        DB::transaction(function () use ($request, $person) {
            $this->uploadFile->upload($request);
            $student = new Student($request->toArray());
            $student->person_id = $person;
            if (!is_null($request->file)) {
                $student->CV = $this->uploadFile->pathForCV . '/' . basename($request->file->getClientOriginalName(),
                        '.' . $request->file->getClientOriginalExtension()) . '_' . time() . '.' . $request->file->getClientOriginalExtension();
            } else {
                $student->CV = null;
            }
            $student->comment = $request->student_comment;
            $student->save();
        });
        return redirect()->back();
    }
}
