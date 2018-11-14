<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupAddFormaValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function addGroup(GroupAddFormaValidation $request)
    {
        DB::table('groups')
            ->insert([
                'group_name' => $request->input('group_name'),
                'start_date' => $request->input('start_date'),
                'finish_date' => $request->input('finish_date'),
                'homecoming_date' => $request->input('homecoming_date'),
                'direction_id' => $request->input('direction_id'),
            ]);
        return redirect()->back();
    }

    public function showGroups()
    {
        $all_groups = DB::table('groups')->paginate(8);
        return view('education', ['all_groups' => $all_groups]);
    }

    public function showAlevel()
    {
        $alevel = DB::table('groups')
            ->leftJoin('directions', 'groups.direction_id', '=', 'directions.id')
            ->get();
        return response()->json($alevel);
    }

    public function groupPersonaView($id)
    {
        $groupView = DB::table('groups')
            ->leftJoin('directions', 'groups.direction_id', '=', 'directions.id')
            ->where('groups.id', '=', $id)
            ->first();
        return view('group', ['groupView' => $groupView]);
    }

}
