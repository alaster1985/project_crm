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
//      dd($request);
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
}
