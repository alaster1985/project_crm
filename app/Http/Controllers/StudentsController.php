<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Group;
use App\Person;
use App\Contact_person;
use App\Skill;
use App\Skill_group;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class StudentsController extends Controller
{


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showStudents()
    {
        $directions = DB::table('directions')->get();
        $groups = DB::table('groups')->get();
        $learningStatus = DB::table('students')->distinct()->get();
        $employmentStatus = DB::table('students')->distinct()->get();
        $all_students = DB::table('persons')
            ->select('persons.id', 'persons.name', 'groups.group_name', 'students.learning_status', 'students.employment_status', 'students.comment')
            ->join('students', 'students.person_id', '=', 'persons.id')
            ->leftJoin('groups', 'groups.id', '=', 'students.group_id')
            ->orderByDesc('students.created_at')
            ->paginate(8);
        return view('students', ['all_students' => $all_students, 'directions' => $directions, 'groups' => $groups,
            'learning_status' => $learningStatus, 'employment_status' => $employmentStatus]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function studentPersonaView($id)
    {


        $company = DB::table('persons')
            ->select('stack_name')
            ->join('students', 'persons.id', '=', 'students.person_id')
            ->join('employment_students', 'employment_students.student_id', '=', 'students.id')
            ->join('it_companies', 'it_companies.id', '=', 'employment_students.company_id')
            ->join('stack_groups', 'stack_groups.company_id', '=', 'it_companies.id')
            ->join('stacks', 'stack_groups.stack_id', '=', 'stacks.id')
            ->where('students.person_id', '=', $id)
            ->get();

        $skill = DB::table('persons')
            ->select('skill_name')
            ->join('students', 'persons.id', '=', 'students.person_id')
            ->join('skill_groups', 'skill_groups.person_id', '=', 'persons.id')
            ->join('skills', 'skill_groups.skill_id', '=', 'skills.id')
            ->where('students.person_id', '=', $id)
            ->get();

        $group = DB::table('persons')
            ->select('group_name', 'learning_status', 'employment_status', 'direction', 'start_date', 'finish_date', 'homecoming_date')
            ->join('students', 'persons.id', '=', 'students.person_id')
            ->Join('groups', 'groups.id', '=', 'students.group_id')
            ->join('directions', 'groups.direction_id', '=', 'directions.id')
            ->where('students.person_id', '=', $id)
            ->get();

        $contact = DB::table('persons')
            ->select('communication_tool', 'contact', 'contacts.comment')
            ->join('contacts', 'persons.id', '=', 'contacts.person_id')
            ->join('students', 'persons.id', '=', 'students.person_id')
            ->where('students.person_id', '=', $id)
            ->get();
        $fone = DB::table('persons')
            ->select('contact')
            ->join('contacts', 'persons.id', '=', 'contacts.person_id')
            ->join('students', 'persons.id', '=', 'students.person_id')
            ->where('communication_tool' , 'mob1')
            ->where('students.person_id', '=', $id)
            ->first();

        $student = DB::table('persons')
            ->select('name', 'persons.address', 'CV', 'company_name', 'position', 'students.comment')
            ->Join('contacts', 'persons.id', '=', 'contacts.person_id')
            ->join('students', 'persons.id', '=', 'students.person_id')
            ->leftjoin('employment_students', 'employment_students.student_id', '=', 'students.id')
            ->leftjoin('it_companies', 'it_companies.id', '=', 'students.company_id')
            ->leftjoin('positions', 'students.position_id', '=', 'positions.id')
            ->where('students.person_id', '=', $id)
            ->first();
        return view('studentPersona', ['student' => $student, 'contact' => $contact, 'group' => $group, 'skill' => $skill, 'company' => $company, 'fone' => $fone]);
//        $studentView = DB::table('person')->where('id_person', '=', $id)->first();01
//        return view('studentPersona', ['studentView' => $studentView]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getStudentNameAddress(Request $request)
    {

        $person = Person::where('id', $request->key)->get();
        return response($person);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getStudentContacts(Request $request)
    {

        $contacts = Contact::where('person_id', $request->key)
            ->get();

        return response($contacts);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getStudyInfo(Request $request)
    {
        $contacts = Student::select('students.person_id', 'group_name', 'learning_status', 'employment_status', 'CV', 'start_date', 'finish_date', 'homecoming_date', 'direction', 'students.comment')
            ->join('groups', 'groups.id', '=', 'students.group_id')
            ->join('directions', 'directions.id', '=', 'groups.direction_id')
            ->where('students.person_id', $request->key)
            ->get();


        return response($contacts);
    }

    public function getStudyCompany(Request $request)
    {
        $contacts = Student::select('company_name', 'position')
            ->join('it_companies', 'it_companies.id', '=', 'students.company_id')
            ->join('positions', 'positions.id', '=', 'students.position_id')
            ->where('students.person_id', $request->key)
            ->get();
        return response($contacts);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getSkills(Request $request)
    {
        $skills = Skill_group::select('skill_groups.id as skillGroupId', 'skills.skill_name', 'skills.id')
            ->join('skills', 'skill_groups.skill_id', '=', 'skills.id')
            ->where('person_id', $request->key)
            ->get();
        return response($skills);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeName(Request $request)
    {
        Person::where('id', $request->id)->update([
            'name' => $request->field
        ]);
        return back();
    }

    public function studentChangeStudentComment(Request $request)
    {
        Student::where('person_id',$request->id)->update([
            'comment' =>$request->field
        ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeAddress(Request $request)
    {
        Person::where('id', $request->id)->update([
            'address' => $request->field
        ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeCommTool(Request $request)
    {
        Contact::where('person_id', $request->id)
            ->where('id', $request->counter)
            ->update([
                'communication_tool' => $request->field
            ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeContact(Request $request)
    {
        Contact::where('person_id', $request->id)
            ->where('id', $request->counter)
            ->update([
                'contact' => $request->field
            ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeContactComment(Request $request)
    {
        Contact::where('person_id', $request->id)
            ->where('id', $request->counter)
            ->update([
                'comment' => $request->field
            ]);
        return back();

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeContactSkills(Request $request)
    {
        Skill_group::where('person_id', $request->id)
            ->delete();

        for($i = 0;$i<count($request->field);$i++) {
            Skill_group::insert(
                ['skill_id' => $request->counter[$i], 'person_id' => $request->id]
            );
        }

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeContactGroup(Request $request)
    {
        Student::where('person_id', $request->id)
            ->update([
                'group_id' => $request->field
            ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeContactLearningStatus(Request $request)
    {
        Student::where('person_id', $request->id)
            ->update([
                'learning_status' => $request->field
            ]);
        return back();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeContactEmploymentStatus(Request $request)
    {
        Student::where('person_id', $request->id)
            ->update([
                'employment_status' => $request->field
            ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeContactDirection(Request $request)
    {
        DB::table('groups')
            ->join('students', 'students.group_id', '=', 'groups.id')
            ->where('students.person_id', '=', $request->id)
            ->update([
                'groups.direction_id' => $request->field
            ]);

        //        Student::where('id', $request->id)
//            ->join('groups','students.group_id','=','groups.id')
//            ->update([
//                'direction_id' => $request->field
//            ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeContactStartDate(Request $request)
    {
        Group::where('group_name', $request->counter)
            ->update([
                'start_date' => $request->field
            ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeContactFinishDate(Request $request)
    {
        Group::where('group_name', $request->counter)
            ->update([
                'finish_date' => $request->field
            ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeContactHomecomingDate(Request $request)
    {
        Group::where('group_name', $request->counter)
            ->update([
                'homecoming_date' => $request->field
            ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function studentChangeContactCompany(Request $request)
    {
        Student::where('person_id', $request->id)
            ->update([
                'company_id' => $request->field
            ]);
        return back();
    }

    public function studentChangeContactCompanyPosition(Request $request)
    {
        Student::where('person_id', $request->id)
            ->update([
                'position_id' => $request->field
            ]);
        return back();
    }


    public function studentPersonaMobila(Request $request)
    {


        $contact = DB::table('contacts')->where('person_id', $request->id)->where('communication_tool', 'cell')->first();
        $this->sendSms($contact->contact, $request->msg);


//        dd($request);
        $this->sendSms($request->contact,$request->msg);
    }


    public function sendSms($mobila, $mess)
    {
        if (isset($_POST['msg'])) {
            $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
            $authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];
            $client = new Client($accountSid, $authToken);
            $message = $client->messages->create(
                "$mobila", array(
                    'from' => '+18178138897',
                    'body' => $mess
                )
            );

            if ($message->sid) {
                echo "Ваше сообщение удачно отправлено!";
            }
        }
    }

}
