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
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $person = new Person($request->toArray());
            $person->save();
            $contact_Person = new Contact_person($request->toArray());
            $contact_Person->person_id = $person->id;
            $contact_Person->comment = $request->contact_person_comment;
            $contact_Person->save();
            foreach ($request->contacts as $value) {
                if (empty($value['contact'])) {
                    continue;
                }
                $contact = new Contact($value);
                $contact->person_id = $person->id;
                $contact->save();
            };
        });
        return redirect()->back();
    }
}
