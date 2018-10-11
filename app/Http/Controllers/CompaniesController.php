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
        $contact = $stack = DB::table('it_companies')
            ->select('persons.name','position','direction','contact_persons.comment')
            ->join('contact_persons', 'contact_persons.company_id', '=', 'it_companies.id')
            ->join('persons', 'contact_persons.person_id', '=', 'persons.id')
            ->join('positions', 'contact_persons.position_id', '=', 'positions.id')
            ->join('directions', 'contact_persons.direction_id', '=', 'directions.id')
            ->where('it_companies.id', '=', $id)
            ->get();
        $stack = DB::table('it_companies')
            ->select('stack_name', 'stack_groups.comment')
            ->join('stack_groups', 'stack_groups.company_id', '=', 'it_companies.id')
            ->join('stacks', 'stack_groups.stack_id', '=', 'stacks.id')
            ->where('it_companies.id', '=', $id)
            ->get();
        $companyView = DB::table('it_companies')
            ->where('it_companies.id', '=', $id)
            ->first();
        return view('companyView', ['companyView' => $companyView, 'stack' => $stack, 'contact' => $contact]);
    }

}