<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 02.10.2018
 * Time: 11:22
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddCompanyController extends Controller
{
    public function addCompany(Request $request)
    {
        DB::transaction(function () use ($request) {
            DB::table('it_companies')
                ->insert([
                    'company_name' => $request->input('company_name'),
                    'address' => $request->input('company_address'),
                    'site' => $request->input('site'),
                    'status' => $request->input('status'),
                    'type' => $request->input('type'),
                    'logo' => basename($_FILES["file"]["name"]),
                    'comment' => $request->input('company_comment'),
                ]);
        });
        return redirect()->back();
    }
}
