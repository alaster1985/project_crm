<?php

namespace App\Services;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadCVService extends Controller
{
    public $pathForCV;
    public $newCVName;
    public function upload(Request $request)
    {
        $this->pathForCV = public_path('CV/' . Group::find($request->group_id)->group_name);
        $this->newCVName = basename($request->file->getClientOriginalName(),
                '.'.$request->file->getClientOriginalExtension())
            .'_'.time(). '.' .$request->file->getClientOriginalExtension();
        if (!file_exists($this->pathForCV)) {
            mkdir($this->pathForCV, 0777, true);
        }
        foreach ($request->files as $file) {
            $file->move($this->pathForCV, $this->newCVName);
        }
    }


}
