<?php

namespace App\Http\Controllers;

use App\Person;
use App\Student;
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
            ->limit(7)
            ->get();
        return response()->json($findAll);
    }






    public function studedit(Request $request)
    {

        $studed = DB::table('students')
            ->leftJoin('persons', 'students.person_id', '=', 'persons.id')
            ->leftJoin('contacts','contacts.person_id','=','persons.id')
            ->leftJoin('groups', 'students.group_id', '=', 'groups.id')
            ->where('students.person_id', '=', $request->key)
            ->first();
        return response()->json($studed);
    }

    public function getStudName(Request $request){

         $person =  Person::where('id',$request->key)->get();
         //$person = Person::with($request->key)->get()->toArray();
            //$student = new Student();

//            $person->id = $request->key;
//            $person->name = 'sad';
//            $person->address = $request->address;
//            $request->created_at = $person->created_at;

       // return json_decode($request);
     //   return response($request);
        return response()->json($person);
    }
    public function test(){
        $person = new Person();
        $person->contacts();
        return response()->json($person);
    }
}


