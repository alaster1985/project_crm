<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageValidation;
use Illuminate\Http\Request;

class Files extends Controller
{
    public function addImage(ImageValidation $request)
    {
        if ($request->isMethod('post')) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $originalFileName = $request->file('image')->getClientOriginalName();
                $file->move(public_path() . '/images', $originalFileName);
            }
        }
        return redirect()->back();
    }


}
