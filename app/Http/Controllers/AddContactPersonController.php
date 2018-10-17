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
use App\Person;
use App\Contact_person;
use App\Contact;

class AddContactPersonController extends Controller
{
//    public function addContactPerson(Request $request)
//    {
//        DB::transaction(function () use ($request) {
//            $lastPersonId = DB::table('persons')
//                ->insertGetId([
//                    'name' => $request->input('person_name'),
//                    'address' => $request->input('person_address'),
//                ]);
//            DB::table('contact_persons')
//                ->insert([
//                    'person_id' => $lastPersonId,
//                    'position_id' => $request->input('position_id'),
//                    'direction_id' => $request->input('direction_id'),
//                    'company_id' => $request->input('company_id'),
//                    'comment' => $request->input('contact_person_comment'),
//                ]);
//            DB::table('contacts')
//                ->insert([
//                    'person_id' => $lastPersonId,
//                    'communication_tool' => $request->input('communication_tool'),
//                    'contact' => $request->input('contact'),
//                    'comment' => $request->input('contact_comment'),
//                ]);
//        });
//        return redirect()->back();
//    }
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $person = new Person();
            $person->name = $request->person_name;
            $person->address = $request->person_address;
            $person->save();
            $contact_person = new Contact_person();
            $contact_person->person_id = $person->id;
            $contact_person->position_id = $request->position_id;
            $contact_person->direction_id = $request->direction_id;
            $contact_person->company_id = $request->company_id;
            $contact_person->comment = $request->contact_person_comment;
            $contact_person->save();
            $contact = new Contact();
            $contact->person_id = $person->id;
            $contact->communication_tool = $request->communication_tool;
            $contact->contact = $request->contact;
            $contact->comment = $request->contact_comment;
            $contact->save();
        });
        return redirect()->back();
    }
}
