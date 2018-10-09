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

class AddEmployeeController extends Controller
{
    public function addEmployee(Request $request)
    {
        DB::transaction(function () use ($request) {
            $lastPersonId = DB::table('persons')
                ->insertGetId([
                    'name' => $request->input('person_name'),
                    'address' => $request->input('person_address'),
                ]);
            DB::table('alevel_members')
                ->insert([
                    'person_id' => $lastPersonId,
                    'position_id' => $request->input('position_id'),
                    'direction_id' => $request->input('direction_id'),
                    'company_id' => $request->input('company_id'),
                    'comment' => $request->input('employee_comment'),
                    'ASPT' => $request->input('ASPT'),
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
