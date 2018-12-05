<?php

namespace App\Http\Controllers;

use App\Alevel_member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Mail;


class EmployeesController extends Controller
{
    public function emploeePersonaView($id)
    {
        $fone = DB::table('persons')
            ->select('contact')
            ->join('contacts', 'persons.id', '=', 'contacts.person_id')
            ->where('communication_tool', 'mob1')
            ->where('person_id', '=', $id)
            ->first();

        $mail = DB::table('persons')
            ->select('contact')
            ->join('contacts', 'persons.id', '=', 'contacts.person_id')
            ->where('communication_tool', 'email')
            ->where('person_id', '=', $id)
            ->first();
        $id = explode('/', $_SERVER["REQUEST_URI"])[count(explode('/', $_SERVER["REQUEST_URI"])) - 1];
        return view('emploeePersona', ['fone' => $fone,'mail' => $mail,'id'=>$id]);

    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addEmployee(Request $request)
    {
        $new = $request->input('employee_name');
        return redirect()->route('show.employees');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEmployees()
    {
        return view('employees');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function emploeePersonaView($id)
//    {
//        return view('emploeePersona');
//    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getInformation(Request $request)
    {
        $contacts = Alevel_member::join('directions', 'directions.id', '=', 'alevel_members.direction_id')
            ->where('alevel_members.person_id', $request->key)
            ->get();

        return response($contacts);
    }

    public function getEmployeeCompany(Request $request)
    {
        $contacts = Alevel_member::select('company_name', 'position')
            ->join('it_companies', 'it_companies.id', '=', 'alevel_members.company_id')
            ->join('positions', 'positions.id', '=', 'alevel_members.position_id')
            ->where('alevel_members.person_id', $request->key)
            ->get();
        return response($contacts);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function employeeChangeDirection(Request $request)
    {
        Alevel_member::where('person_id', $request->id)
            ->update([
                'direction_id' => $request->field
            ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function employeeChangeComment(Request $request)
    {
        Alevel_member::where('person_id', $request->id)->update([
            'comment' => $request->field
        ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function employeeChangeASPT(Request $request)
    {
        Alevel_member::where('person_id', $request->id)->update([
            'ASPT' => $request->field
        ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function employeeChangeCompany(Request $request)
    {
        Alevel_member::where('person_id', $request->id)
            ->update([
                'company_id' => $request->field
            ]);
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function employeeChangePosition(Request $request)
    {
        Alevel_member::where('person_id', $request->id)
            ->update([
                'position_id' => $request->field
            ]);
        return back();

    }

    public function getStudyCompanyStacks(Request $request)
    {
        $stacks = Alevel_member::select('stack_name', 'stacks.id')
            ->join('it_companies', 'it_companies.id', '=', 'alevel_members.company_id')
            ->join('stack_groups', 'stack_groups.company_id', '=', 'it_companies.id')
            ->join('stacks', 'stack_groups.stack_id', '=', 'stacks.id')
            ->where('alevel_members.person_id', $request->key)
            ->get();
        return response($stacks);
    }
    public function sendSms1(Request $request)
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

    public function sendMail1(Request $request)
    {
        $mail = $request->mail;
        $text = $request->msg1;

        Mail::raw("$text", function ($message) use ($mail) {
            $message->subject("Информация от A-level");
            $message->to("$mail");
        });
        return redirect()->back() ->with('alert  ', 'Новая версия');
    }

}
