<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadLogoService extends Controller
{
    public $pathForLogo;
    public $newLogoName;
    public function upload(Request $request)
    {
        $this->pathForLogo = public_path('Logo');
        $this->newLogoName = $request->company_name
            .'_'.time(). '.' .$request->file->getClientOriginalExtension();
        if (!file_exists($this->pathForLogo)) {
            mkdir($this->pathForLogo, 0777, true);
        }
        foreach ($request->files as $file) {
            $file->move($this->pathForLogo, $this->newLogoName);
        }
    }
}
