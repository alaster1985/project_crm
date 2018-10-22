<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 02.10.2018
 * Time: 11:22
 */

namespace App\Http\Controllers;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\It_company;
use App\Stack_group;

class AddCompanyController extends Controller
{
//    public function addCompany(Request $request)
//    {
//        DB::transaction(function () use ($request) {
//            DB::table('it_companies')
//                ->insert([
//                    'company_name' => $request->input('company_name'),
//                    'address' => $request->input('company_address'),
//                    'site' => $request->input('site'),
//                    'status' => $request->input('status'),
//                    'type' => $request->input('type'),
//                    'logo' => basename($_FILES["file"]["name"]),
//                    'comment' => $request->input('company_comment'),
//                ]);
//        });
//        return redirect()->back();
//    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $it_Company = new It_company();
            $it_Company->company_name = $request->company_name;
            $it_Company->address = $request->company_address;
            $it_Company->site = $request->site;
            $it_Company->status = $request->status;
            $it_Company->type = $request->type;
            $it_Company->logo = basename($_FILES["file"]["name"]);
            $it_Company->comment = $request->company_comment;
            $it_Company->save();
            $stack_Group = new Stack_group();
            $stack_Group->company_id = $it_Company->id;
            $stack_Group->stack_id = $request->stack_id;
            $stack_Group->comment = $request->stack_comment;
            $stack_Group->save();
        });
        return redirect()->back();
    }
}
