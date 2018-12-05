<?php

namespace App\Http\Controllers;

use App\Alevel_member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{

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
    public function emploeePersonaView($id)
    {
        $id = explode('/', $_SERVER["REQUEST_URI"])[count(explode('/', $_SERVER["REQUEST_URI"])) - 1];
        return view('emploeePersona',['id'=>$id]);
    }

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

}
