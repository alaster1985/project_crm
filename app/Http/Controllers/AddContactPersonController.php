<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 04.10.2018
 * Time: 15:48
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddContactPersonController extends Controller
{
    public function addContactPerson(Request $request)
    {
        DB::transaction(function () use ($request) {
            $lastPersonId = DB::table('persons')
                ->insertGetId([
                    'name' => $request->input('person_name'),
                    'address' => $request->input('person_address'),
                ]);
            DB::table('contact_persons')
                ->insert([
                    'person_id' => $lastPersonId,
                    'position_id' => $request->input('position_id'),
                    'direction_id' => $request->input('direction_id'),
                    'company_id' => $request->input('company_id'),
                    'comment' => $request->input('contact_person_comment'),
                ]);
            DB::table('contacts')
                ->insert([
                    'person_id' => $lastPersonId,
                    'communication_tool' => $request->input('communication_tool'),
                    'contact' => $request->input('contact'),
                    'comment' => $request->input('contact_comment'),
                ]);
            return redirect()->back();
        });
    }
}
