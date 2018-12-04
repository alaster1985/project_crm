<?php
namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilesController extends Controller
{

    public function show($user)
    {
        return view('userprofile', [
            'profileUser' => $user,
        ]);
    }

    public function getProfileInfo(Request $request ){

        $user= User::where('id',$request->key)
            ->get();

        return response($user);
    }

    public function changeUserName(Request $request){

        User::where('id',$request->id)
            ->update([
                'name' => $request->field
            ]);

        return back();
    }
    //ProfilesController@changeUserPassword

    public function changeUserPassword(Request $request){
        User::where('id',$request->id)
            ->update([
                'password' => bcrypt($request->field)
            ]);
        return back();
    }

    public function changeUserEmail(Request $request){
        User::where('id',$request->id)
            ->update([
                'email' => $request->field
            ]);
        return back();
    }

}