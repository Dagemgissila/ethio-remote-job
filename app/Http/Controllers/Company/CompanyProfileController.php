<?php

namespace App\Http\Controllers\Company;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CompanyProfileController extends Controller
{
    public function index(){
        $profile=Company::query()->where("user_id",auth()->user()->id)->first();
    
        return view("company.profile",compact("profile"));
    }

    public function updateProfile(Request $request){
    
        $request->validate([
            "founder_name"=>["required","string","max:255"],
            'company_logo' => ['nullable', 'file', 'mimes:jpeg,jpg,png',"max:1024"],
            "email"=>["required","email","string","max:255",  Rule::unique('users')->ignore(auth()->user()->id),],
            "address"=>["required","string","max:255"],
            "phone_number"=>["required","string","max:13"],
            "company_name"=>["required","string","max:255"],
            "description"=>["required","string","max:1200"],
            "linkdelin"=>["url","max:255","nullable"],
            "facebook"=>["max:255","url","nullable"],
            "telegram"=>["max:255","url","nullable"],
            
       ]);
       if ($request->hasFile('company_logo')) {
        $logo = $request->file('company_logo');
        $logoPath = $logo->store('companyLogo', 'public');
    } else {
        $logoPath = auth()->user()->company->logo;
    }
     DB::beginTransaction();

try {
    Company::where("user_id", auth()->user()->id)->update([
        "fullname" => $request->founder_name,
        "city" => $request->city,
        "city" => $request->address,
        "logo" => $logoPath,
        "phone_number" => $request->phone_number,
        "company_name" => $request->company_name,
        "description" => $request->description,
        "linkdelin" => $request->linkdelin,
        "facebook" => $request->facebook,
        "telegram" => $request->telegram,
    ]);

    User::whereId(auth()->user()->id)->update([
        "email" => $request->email
    ]);

    DB::commit();
 
} catch (\Exception $e) {
    DB::rollback();
    return back()->with("error","something wrong");
}

    return redirect()->back()->with("success","profile update succesfully");
       
    }
}
