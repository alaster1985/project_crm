<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 01.10.2018
 * Time: 11:49
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddStudentController extends Controller
{
    public function addStudent(Request $request)
    {
        DB::transaction(function () use ($request) {
            $lastPersonId = DB::table('persons')
                ->insertGetId([
                    'name' => $request->input('person_name'),
                    'address' => $request->input('person_address'),
                ]);
            DB::table('students')
                ->insert([
                    'person_id' => $lastPersonId,
                    'group_id' => $request->input('group_id'),
                    'learning_status' => $request->input('learning_status'),
                    'employment_status' => $request->input('employment_status'),
                    'member_id' => $request->input('member_id'),
                    'company_id' => $request->input('company_id'),
                    'position_id' => $request->input('position_id'),
                    'CV' => basename($_FILES["file"]["name"]),
                    'comment' => $request->input('student_comment'),
                ]);
            DB::table('contacts')
                ->insert([
                    'person_id' => $lastPersonId,
                    'communication_tool' => $request->input('communication_tool'),
                    'contact' => $request->input('contact'),
                    'comment' => $request->input('contact_comment'),
                ]);
            DB::table('skill_groups')
                ->insert([
                    'person_id' => $lastPersonId,
                    'skill_id' => $request->input('skill_id'),
                ]);
        });
        return redirect()->back();
    }
}
