<?php

namespace App\Http\Controllers;


use App\Contact;
use App\Direction;
use App\It_company;
use App\Person;
use App\Position;
use App\Student;
use App\Alevel_member;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dbrequest extends Controller
{

    public function direction()
    {
        return response()->json(Direction::select('id','direction')->distinct()->orderBy('id')->get());
    }

    public function groups()
    {
        $groups = DB::table('groups')->get();
        return response()->json($groups);
    }

    public function skills()
    {
        $skills = DB::table('skills')->get();
        return response()->json($skills);
    }

    public function stacks()
    {
        $stacks = DB::table('stacks')->get();
        return response()->json($stacks);
    }

    public function companies()
    {
        return response()->json(It_company::select('id','company_name')->distinct()->get());
    }

    public function positions()
    {
        return response()->json(Position::select('position','id')->distinct()->orderBy('id')->get());
    }

    public function member()
    {
        $members = [];
        foreach (Alevel_member::all()->where('ASPT', '=', '0') as $member) {
            $person = Person::find($member->person_id);
            array_push($members, [
                'id' => Alevel_member::where('person_id', $person->id)->first()->id,
                'name' => $person->name,
            ]);
        }
        return response()->json($members);
    }

    public function students()
    {
        $students = DB::table('students')
            ->leftJoin('persons', 'students.person_id', '=', 'persons.id')
            ->get();

        return response()->json($students);
    }

    public function smsphones(Request $request)
    {

        $aa = $request->get(0);
        $textmessage = $request->get(1);

        $contacts = DB::table('contacts')
            ->get();
//
        foreach ($contacts as $item) {
            foreach ($aa as $id) {
                if (($id == $item->person_id) && ($item->communication_tool == 'mob1') ) {
                    $array_numbers[] = $item->contact;
                }
            }
        }


        foreach($array_numbers as $mob)
        {
            if (isset($mob) && isset($textmessage)) {
                $accountSid = "AC1df6f09949519b33a45168cb3c568d24";
                $authToken = "bfff6970a1a4e5913b079b82d4b6c617";
                $client = new Client($accountSid, $authToken);
                $message = $client->messages->create(
                    $mob, array(
                        'from' => '+14133393335',
                        'body' => $textmessage
                    )
                );


            }
        }
        if ($message->sid) {
            return redirect()->back() ->with('alert  ', 'Сообщение отправлено');
        }

    }
    function sendMail(Request $request)
    {
        $aa = $request->get(0);
        $text = $request->get(1);
        $contacts = DB::table('contacts')
            ->get();

        foreach ($contacts as $item) {
            foreach ($aa as $id) {
                if (($id == $item->person_id) && ($item->communication_tool == 'email') ) {
                    $array_mails[] = $item->contact;
                }
            }
        }

        foreach($array_mails as $newmail)
        {
            Mail::raw("$text", function ($message) {
                $message->subject("Информация от A-level");
                $message->to("$newmail");
            });
        }

        return redirect()->back() ->with('alert  ', 'Новая версия');




    }



    public function employeesdata()
    {
        $employeesdata = DB::table('alevel_members')
            ->leftJoin('persons', 'alevel_members.person_id', '=', 'persons.id')
 //           ->leftJoin('users', 'alevel_members.person_id', '=', 'users.id')
            ->leftJoin('contacts', 'alevel_members.person_id', '=', 'contacts.person_id')
            ->leftJoin('positions', 'alevel_members.position_id', '=', 'positions.id')
            ->leftJoin('directions', 'alevel_members.direction_id', '=', 'directions.id')
            ->leftJoin('it_companies', 'alevel_members.company_id', '=', 'it_companies.id')
            ->get();

        return response()->json($employeesdata);
    }



    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function findStudents(Request $request)
    {
        $findstudents = DB::table('students')
            ->leftJoin('persons', 'students.person_id', '=', 'persons.id')
            ->where('persons.name', 'LIKE', "%{$request->key}%")
            ->limit(10)
            ->get();
        return response()->json($findstudents);
    }


    public function findAll(Request $request)
    {
        $findAll = DB::table('persons')
            ->where('persons.name', 'LIKE', "%{$request->key}%")
            ->limit(10)
            ->get();
//        return response()->json($request);
        return response()->json($findAll);
    }

// Students from direct
    public function studentsDirection(Request $request)
    {
        $studentdirection = DB::table('students')
            ->leftJoin('persons', 'students.person_id', '=', 'persons.id')
            ->leftJoin('groups', 'students.group_id', '=', 'groups.id')
            ->leftJoin('directions', 'groups.direction_id', '=', 'directions.id')
            ->where('groups.direction_id', '=', $request->key)
            ->get();
//        $studentdirection = Direction::find(dd($request->key))->first()->groups;
//            dd($studentdirection);
        return response()->json($studentdirection);
    }

// Students from group
    public function studentsGroupsOutput(Request $request)
    {
        $studentsGroupsOutput = DB::table('students')
            ->leftJoin('persons', 'students.person_id', '=', 'persons.id')
            ->leftJoin('groups', 'students.group_id', '=', 'groups.id')
            ->leftJoin('directions', 'groups.direction_id', '=', 'directions.id')
            ->where('groups.group_name', '=', $request->key)
            ->get();
        return response()->json($studentsGroupsOutput);
    }

// All students
    public function studentsAllOutput(Request $request)
    {
        $studentsAllOutput = DB::table('students')
            ->leftJoin('persons', 'students.person_id', '=', 'persons.id')
            ->leftJoin('groups', 'students.group_id', '=', 'groups.id')
            ->leftJoin('directions', 'groups.direction_id', '=', 'directions.id')
            ->get();
        return response()->json($studentsAllOutput);
    }

    public function studentsGroup(Request $request)
    {
        $studentgroup = DB::table('students')
            ->leftJoin('persons', 'students.person_id', '=', 'persons.id')
            ->leftJoin('groups', 'students.group_id', '=', 'groups.id')
            ->where('groups.group_name', '=', $request->key)
            ->get();

        return response()->json($studentgroup);
    }


    public function studedit(Request $request)
    {

        $studed = DB::table('students')
            ->leftJoin('persons', 'students.person_id', '=', 'persons.id')
            ->leftJoin('contacts', 'contacts.person_id', '=', 'persons.id')
            ->leftJoin('groups', 'students.group_id', '=', 'groups.id')
            ->where('students.person_id', '=', $request->key)
            ->first();
        return response()->json($studed);
    }

    public function getStudName(Request $request)
    {
        $person = Person::where('id', $request->key)->get();
        return response($person);
    }

    public function getCommunicationTools()
    {
        return response()->json(Contact::select('communication_tool')->distinct()->get());
    }

    public function getLearningStatus()
    {
        return response()->json(Student::select('learning_status')->distinct()->get());
    }

    public function getEmploymentStatus()
    {
        return response()->json(Student::select('employment_status')->distinct()->get());
    }
}
