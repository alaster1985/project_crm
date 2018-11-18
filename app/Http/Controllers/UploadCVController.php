<?php

namespace App\Http\Controllers;
use App\Group;
use Illuminate\Http\Request;

class UploadCVController extends Controller
{
    public $pathForCV;
    public function upload(Request $request)
    {
        $this->pathForCV = storage_path('CV/' . Group::find($request->group_id)->group_name);
        if (!file_exists($this->pathForCV)) {
            mkdir($this->pathForCV, 0777, true);
        }
        foreach ($request->files as $file) {
            $file->move($this->pathForCV, basename($request->file->getClientOriginalName(), '.'.$request->file->getClientOriginalExtension()).'_'.time(). '.' .$request->file->getClientOriginalExtension());
        }
    }
}
