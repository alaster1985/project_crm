<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 15.10.2018
 * Time: 15:41
 */

namespace App\Http\Controllers;


use App\ComponentFactory;
use App\Http\Requests\StoreComponent;
use Illuminate\Support\Facades\DB;

class AddComponentController extends Controller
{
    public function store(StoreComponent $request)
    {
        $arr = $request->toArray();
        end($arr);
        $param = key($arr);
        $component = ComponentFactory::get($param, $arr);
        $component->save();
        return redirect()->back();
    }

    public function index()
    {
        $skills = DB::table('skills')->get();
        $stacks = DB::table('stacks')->get();
        $directions = DB::table('directions')->get();
        $positions = DB::table('positions')->get();
        return view('addcomponent', compact('skills', 'stacks', 'directions', 'positions'));
    }
}
