<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 02.10.2018
 * Time: 11:22
 */

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompany;
use Illuminate\Support\Facades\DB;
use App\It_company;
use App\Stack_group;

class AddCompanyController extends Controller
{
    public function store(StoreCompany $request)
    {
        DB::transaction(function () use ($request) {
            $it_Company = new It_company();
            $it_Company->fill($request->input() + [
                    'comment' => $request->company_comment,
                    'logo' => basename($_FILES["file"]["name"]),
                ]);
            $it_Company->save();
            foreach ($request->stacks as $value) {
                if (empty($value['stack_id'])) {
                    continue;
                }
                $stack_Group = new Stack_group($value);
                $stack_Group->company_id = $it_Company->id;
                $stack_Group->fill([
                    'comment' => $value['stack_comment'],
                ]);
                $stack_Group->save();
            }
        });
        return redirect()->back();
    }
}
