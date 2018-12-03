<?php
namespace App\Http\Controllers;
use App\Contact;
use App\Group;
use App\Person;
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
        $fone = DB::table('persons')
            ->select('contact')
            ->join('contacts', 'persons.id', '=', 'contacts.person_id')
            ->join('students', 'persons.id', '=', 'students.person_id')
            ->where('communication_tool', 'mob1')
            ->where('students.person_id', '=', $id)
            ->first();
        $id = explode('/', $_SERVER["REQUEST_URI"])[count(explode('/', $_SERVER["REQUEST_URI"])) - 1];
        return view('studentPersona', ['fone' => $fone,'id'=>$id]);
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


    public function getStudyCompanyStacks(Request $request)
    {
        $stacks = Student::select('stack_name', 'stacks.id')
            ->join('it_companies', 'it_companies.id', '=', 'students.company_id')
            ->join('stack_groups','stack_groups.company_id','=','it_companies.id')
            ->join('stacks','stack_groups.stack_id','=','stacks.id')
            ->where('students.person_id', $request->key)
            ->get();
        return response($stacks);
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
        Student::where('person_id', $request->id)->update([
            'comment' => $request->field
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
//<<<<<<< HEAD

//        for ($i = 0; $i < count($request->field); $i++) {
//=======
        for($i = 0;$i<count($request->field);$i++) {
//>>>>>>> e01e21b03325ee973aab1aa2e3fef0b387c76aa0
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
    public function sendSms(Request $request)
    {
        $mobila = $request->contact;
        $mess = $request->msg;

        if (isset($mess)) {
            $accountSid = "AC1df6f09949519b33a45168cb3c568d24";
            $authToken = "bfff6970a1a4e5913b079b82d4b6c617";
            $client = new Client($accountSid, $authToken);
            $message = $client->messages->create(
                "$mobila", array(
                    'from' => '+14133393335',
                    'body' => $mess
                )
            );

            if ($message->sid) {
                return redirect()->back() ->with('alert  ', 'Сообщение отправлено');
            }
        }
    }

}
