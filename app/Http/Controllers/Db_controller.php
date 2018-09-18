<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Db_controller extends Controller
{
    public function add(Request $request) {
            $new = $request->input('student_name');
            return view('students');
//        return view('students', ['error' => $error]);
        }
}
