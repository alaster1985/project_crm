<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 01.10.2018
 * Time: 11:49
 */

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent;
use Illuminate\Support\Facades\DB;

use App\Person;
use App\Student;
use App\Contact;
use App\Skill_group;

class AddStudentController extends Controller
{
    protected $uploadFile;

    public function __construct()
    {
        $this->uploadFile = new UploadCVController();
    }

    public function store(StoreStudent $request)
    {
        DB::transaction(function () use ($request) {
            $this->uploadFile->upload($request);
            $person = new Person($request->toArray());
            $person->save();
            $student = new Student($request->toArray());
            $student->person_id = $person->id;
            if (!is_null($request->file)) {
                $student->CV = $this->uploadFile->pathForCV . '/' . basename($request->file->getClientOriginalName(),
                        '.' . $request->file->getClientOriginalExtension()) . '_' . time() . '.' . $request->file->getClientOriginalExtension();
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
        return redirect()->back();
    }
}
