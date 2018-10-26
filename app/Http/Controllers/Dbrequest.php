<?php

namespace App\Http\Controllers;


use App\Contact;
use App\Direction;
use App\It_company;
use App\Person;
use App\Position;
use App\Student;
use App\Alevel_member;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dbrequest extends Controller
{

    public function direction()
    {
        return response()->json(Direction::select('direction')->distinct()->get());
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
        return response()->json(It_company::select('company_name')->distinct()->get());
    }

    public function positions()
    {
        return response()->json(Position::select('position')->distinct()->get());
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function findStudents(Request $request)
    {
        $findstudents = DB::table('students')
            ->leftJoin('persons', 'students.person_id', '=', 'persons.id')
            ->where('persons.name', 'LIKE', "%{$request->key}%")
            ->limit(7)
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
