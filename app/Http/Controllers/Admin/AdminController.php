<?php

namespace App\Http\Controllers\Admin;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

//use App\Role;
class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        $user = Auth::user();
        return view('admin/dashboard', ['user' => $user]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewUsers()
    {
        $user = Auth::user();
        $all_students = DB::table('users')
            ->select('users.name', 'email', 'roles.display_name', 'users.id')
            ->join('role_user', 'user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_id')
            ->get();
        return view('admin/userView', ['user' => $user, 'allUsers' => $all_students]);
    }

    /**
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($id = null)
    {
        //DB::table('users')->where('id', '=', $id)->delete();
        DB::table('tasks')->where('user_id_customer', '=', $id)
            ->where('user_id_doer', '=', $id)
            ->delete();
        DB::table('users')->where('id', '=', $id)->delete();
        return back();

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editUsers($id)
    {
        $user = Auth::user();
        $hotUser = DB::table('users')
            ->select('users.name', 'email', 'roles.display_name', 'users.id', 'password', 'roles.name as role_name')
            ->join('role_user', 'user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_id')
            ->where('users.id', '=', $id)
            ->get();
        $role = DB::table('roles')
            ->where('id', '>', 1)
            ->get();
        return view('/admin/edit', ['user' => $user, 'hotUser' => $hotUser, 'role' => $role]);
    }

    /**
     * @param Request $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser(Request $data)
    {
        DB::table('users')
            ->where('users.email', '=', $data->email)
            ->update([
                'email' => $data->email,
                'name' => $data->name
            ]);
        if ($data->password) {
            DB::table('users')
                ->where('users.email', '=', $data->email)
                ->update([
                    'password' => bcrypt($data->password),
                ]);
        }

        DB::table('role_user')
            ->join('users', 'users.id', '=', 'user_id')
            ->where('users.id', '=', $data->id)
            ->update([
                'role_id' => $data->role,
            ]);
        return redirect()->route('viewUsers');
    }

//createUser
    public function createUserView()
    {
        $user = Auth::user();
        $role = DB::table('roles')
            ->where('id', '>', 1)
            ->get();
        return view('admin/createUserView', ['user' => $user, 'role' => $role]);

    }

    public function createUser(Request $data)
    {
        if (!($data->name || $data->email || $data->password || $data->role)) {
            return back();
        } else {

            DB::table('users')
                ->insert([
                    'email' => $data->email,
                    'name' => $data->name,
                    'password' => bcrypt($data->password)
                ]);
            $id = DB::table('users')
                ->select('id')
                ->where('email', '=', $data->email)
                ->get();

            DB::table('role_user')
                ->insert([
                    'role_id' => $data->role,
                    'user_id' => $id[0]->id,
                    'user_type'=> 'App\User'
                ]);
            return redirect()->route('viewUsers');
        }
    }

}