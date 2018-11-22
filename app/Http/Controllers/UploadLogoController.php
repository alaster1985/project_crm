<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadLogoController extends Controller
{
    public $pathForLogo;
    public $newLogoName;
    public function upload(Request $request)
    {
        $this->pathForLogo = storage_path('Logo/');
        $this->newLogoName = basename($request->file->getClientOriginalName(),
                '.'.$request->file->getClientOriginalExtension())
            .'_'.time(). '.' .$request->file->getClientOriginalExtension();
        if (!file_exists($this->pathForLogo)) {
            mkdir($this->pathForLogo, 0777, true);
        }
        foreach ($request->files as $file) {
            $file->move($this->pathForLogo, $this->newLogoName);
        }
    }
}
