<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class db_controller extends Controller
{
    public function add(Request $request) {
            $new = $request->input('student_name');
//            return view('login', ['error' => $error]);
           dd($new);
        }
}
