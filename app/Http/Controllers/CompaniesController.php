<?php
/**
 * Created by PhpStorm.
 * User: vlastit
 * Date: 01.10.18
 * Time: 21:16
 */

namespace App\Http\Controllers;

use App\Http\Requests\ImageValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{

    public function showCompanies()
    {
        $all_companies = DB::table('it_companies')
            ->paginate(8);
        return view('companies', ['all_companies' => $all_companies]);
    }

    public function companyPersonalView($id)
    {
        $companyView = DB::table('it_companies')
            ->where('it_companies.id', '=', $id)
            ->first();
        return view('companyView', ['companyView' => $companyView]);
    }

}