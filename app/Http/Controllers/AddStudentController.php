<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 01.10.2018
 * Time: 11:49
 */

namespace App\Http\Controllers;

use App\Alevel_member;
use App\Http\Requests\StoreStudent;
use App\Services\UploadCVService;
use Illuminate\Support\Facades\DB;

use App\Person;
use App\Student;
use App\Contact;
use App\Skill_group;

class AddStudentController extends Controller
{
    protected $uploadFile;

    public function store(StoreStudent $request)
    {
        DB::transaction(function () use ($request) {

            $person = new Person($request->toArray());
            $person->save();
            $student = new Student($request->toArray());
            $student->person_id = $person->id;
            if (!is_null($request->file)) {
                $this->uploadFile = new UploadCVService();
                $this->uploadFile->upload($request);
                $student->CV = $this->uploadFile->pathForCV . '/' . $this->uploadFile->newCVName;
            } else {
                $student->CV = null;
            }
            $student->comment = $request->student_comment;
            $student->save();
            foreach ($request->contacts as $value) {
                if (empty($value['contact'])) {
                    continue;
                }
                $contact = new Contact($value);
                $contact->person_id = $person->id;
                $contact->save();
            };
            if (isset($request->skill_id)) {
                foreach ($request->skill_id as $value) {
                    $skill_Group = new Skill_group();
                    $skill_Group->person_id = $person->id;
                    $skill_Group->skill_id = $value;
                    $skill_Group->save();
                }
            }
        });
        return redirect()->back()->with('message', 'DONE!');
    }
    public function index()
    {
        $groups = DB::table('groups')->get();
        $skills = DB::table('skills')->get();
        $companies = DB::table('it_companies')->get();
        $members = [];
        foreach (Alevel_member::all()->where('ASPT', '=', '0') as $member) {
            $person = Person::find($member->person_id);
            array_push($members, [
                'id' => Alevel_member::where('person_id', $person->id)->first()->id,
                'name' => $person->name,
            ]);
        }
        $positions = DB::table('positions')->get();
        return view('addstudent', compact('groups', 'skills', 'companies', 'members', 'positions'));
    }
}
