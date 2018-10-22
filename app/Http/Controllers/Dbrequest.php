<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dbrequest extends Controller
{

    public function direction()
    {
        $direction = DB::table('directions')->get();
        return response()->json($direction);
//        return response()->json(['response' => 'This is post method']);
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
        $companies = DB::table('it_companies')->get();
        return response()->json($companies);
    }

    public function positions()
    {
        $positions = DB::table('positions')->get();
        return response()->json($positions);
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


    public function studentsDirection(Request $request)
    {
        $studentdirection = DB::table('students')
            ->leftJoin('persons', 'students.person_id', '=', 'persons.id')
            ->leftJoin('groups', 'students.group_id', '=', 'groups.id')
            ->leftJoin('directions', 'groups.direction_id', '=', 'directions.id')
            ->where('directions.id', '=', $request->key)
            ->get();
        return response()->json($studentdirection);
    }

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
            ->leftJoin('groups', 'students.group_id', '=', 'groups.id')
            ->where('students.person_id', '=', $request->key)
            ->first();
        return response()->json($studed);
    }
}


