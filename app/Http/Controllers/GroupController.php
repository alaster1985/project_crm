<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\GroupAddFormaValidation;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function store(GroupAddFormaValidation $request)
    {
        $group = new Group($request->toArray());
        $group->direction_id = $request->direction_it;
        $group->save();
        return redirect()->back();
    }

    public function showGroups()
    {
        $directions = DB::table('directions')->get();
        $all_groups = DB::table('groups')->paginate(8);
        return view('education', [
            'all_groups' => $all_groups,
            'directions' => $directions,
            ]);
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
