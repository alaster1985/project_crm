<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\GroupAddFormaValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * @param GroupAddFormaValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(GroupAddFormaValidation $request)
    {
        $group = new Group($request->toArray());
        $group->direction_id = $request->direction_it;
        $group->save();
        return redirect()->back()->with('message', 'DONE!');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function showGroups()
    {
        $directions = DB::table('directions')->get();
        $all_groups = DB::table('groups')->paginate(8);
        return view('education', [
            'all_groups' => $all_groups,
            'directions' => $directions,
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */

    public function showAlevel()
    {
        $alevel = DB::table('groups')
            ->select('groups.id', 'group_name', 'direction', 'finish_date', 'start_date')
            ->Join('directions', 'groups.direction_id', '=', 'directions.id')
            ->get();
        return response()->json($alevel);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function groupPersonaView($id)
    {
//        $groupView = DB::table('groups')
//            ->leftJoin('directions', 'groups.direction_id', '=', 'directions.id')
//            ->where('groups.id', '=', $id)
//            ->first();
        return view('group');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getGroupInformation(Request $request){


    $groups = DB::table('groups')
        ->join('directions','directions.id','=','groups.direction_id')
        ->where('groups.id', $request->key)
        ->get();
            return response($groups);
     //   return back();

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function groupNameChange(Request $request){

        Group::where('id', $request->id)->update([
            'group_name' => $request->field
        ]);
        return back();
    }

    public function changeGroupsDirection(Request $request){
        //return dd($request);
        Group::where('id', $request->id)->update([
                'direction_id' => $request->field
            ]);
        return back();
    }

    public function ChangeStartDate(Request $request){
        Group::where('id', $request->id)->update([
            'start_date' => $request->field
        ]);
        return back();
    }

    public function ChangeEndDate(Request $request){
        Group::where('id', $request->id)->update([
            'finish_date' => $request->field
        ]);
        return back();
    }

    public function ChangeHomecomingDate(Request $request){
        Group::where('id', $request->id)->update([
            'homecoming_date' => $request->field
        ]);
        return back();
    }

}
