<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCompanyController extends Controller
{
    public function index(){
        $companys=Company::query()->orderBy("created_at","desc")->get();
        return view("admin.company.index",compact("companys"));
    }

    public function companyDetail($id){
        $company=Company::find($id);

        if($company){
            return view("admin.company.companyDetail",compact("company"));
        }

        abort(404);
    }

    public function ApproveCompany(Request $request){
        $company=User::find($request->company_id);


        if($company){
           User::whereId($company->id)->update([
            "status"=>1
           ]);
            return redirect()->back()->with("success","company approved successfully");
        }
    }

    public function deleteCompany(Request $request){
            $company=User::find($request->company_id);

            if($company){
                $company->delete();
                return redirect()->back()->with("success","company approved successfully");
            }
    }

    public function restrictCompany(Request $request){
        $company=User::find($request->company_id);


        if($company){
           User::whereId($company->id)->update([
            "status"=>0
           ]);
            return redirect()->back()->with("success","companny is restricted succesfully");
        }
    }
}
