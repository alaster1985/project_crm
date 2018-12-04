<?php

namespace App\Http\Controllers;

use App\Contact_person;
use App\Http\Requests\StoreCurrentContactPerson;
use Illuminate\Support\Facades\DB;

class AddCurrentContactPersonController extends Controller
{
    public function index($person)
    {
        $person = DB::table('persons')->find($person);
        $contacts = DB::table('contacts')
            ->get()
            ->where('person_id', '=', $person->id)
            ->toArray();

        $mob1 = $mob2 = $email = $skype = $other = [
            'contact' => '',
            'comment' => '',
        ];
        $params = [
            'mob1' => $mob1,
            'mob2' => $mob2,
            'email' => $email,
            'skype' => $skype,
            'other' => $other
        ];
        foreach ($contacts as $contact) {
            foreach ($params as $key => $value) {
                if ($contact->communication_tool === $key) {
                    $params[$key] = [
                        'contact' => $contact->contact,
                        'comment' => $contact->comment,
                    ];
                }
            }
        }

        $companies = DB::table('it_companies')->get();
        $positions = DB::table('positions')->get();
        $directions = DB::table('directions')->get();

        return view('addcurrentcontactperson', [
            'person' => $person->id,
            'name' => $person->name,
            'address' => $person->address,
            'companies' => $companies,
            'positions' => $positions,
            'directions' => $directions,
            'mob1_contact' => $params['mob1']['contact'],
            'mob1_comment' => $params['mob1']['comment'],
            'mob2_contact' => $params['mob2']['contact'],
            'mob2_comment' => $params['mob2']['comment'],
            'email_contact' => $params['email']['contact'],
            'email_comment' => $params['email']['comment'],
            'skype_contact' => $params['skype']['contact'],
            'skype_comment' => $params['skype']['comment'],
            'other_contact' => $params['other']['contact'],
            'other_comment' => $params['other']['comment'],
        ]);
    }

    public function store(StoreCurrentContactPerson $request, $person)
    {
        DB::transaction(function () use ($request, $person) {
            $contact_Person = new Contact_person($request->toArray());
            $contact_Person->person_id = $person;
            $contact_Person->comment = $request->contact_person_comment;
            $contact_Person->save();
        });
        return redirect()->route('ShowCompanies');
    }
}
