<?php
namespace App\Http\Controllers;


class ProfilesController extends Controller
{


    public function show($user)
    {
        return view('profiles.show', [
            'profileUser' => $user,
        ]);
    }
}
