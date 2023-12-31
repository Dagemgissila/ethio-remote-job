<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Company;
use App\Models\Startup;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterCompanyController extends Controller
{
    public function index(){
        $user=User::count();
        if($user == 0){
          return view('auth.adminregister');
           }
        return view("auth.company");
    }

    public function index2(){
        $user=User::count();
        if($user == 0){
          return view('auth.adminregister');
           }
        return view('auth.start-up-register');
    }

    public function licencedCompanyRegister(Request $request){
        $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'company_logo' => ['required', 'file', 'mimes:jpeg,jpg,png',"max:1024"],
            'description' => ['required', 'string', 'max:1200'],
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',"unique:".User::class],
            'phone_number' => ['required', 'string', 'min:10', 'max:13'],
            'city' => ['required', 'string', 'max:255'],
            'linkdelin' => ['url', 'max:255',"nullable"],
            'facebook' => ['url', 'max:255',"nullable"],
            'telegram' => ['url', 'max:255',"nullable"],
            'tin_number' => ['required', 'string', 'max:255'],
            'license' => ['required', 'file', 'max:2048'],
            'password' => ['required', 'string', 'min:8', 'max:15', 'confirmed'],
        ]);

        DB::beginTransaction();
         try{
            if ($request->hasFile('company_logo')) {
                $logo = $request->file('company_logo');
                $logoPath = $logo->store('companyLogo', 'public');
            } else {
                $logoPath = null;
            }

            if ($request->hasFile('license')) {
                $license = $request->file('license');
                $licensePath = $license->store('license', 'public');
            } else {
                $licensePath = null;
            }

            // Create a new User
            $user = new User;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->assignRole('company');
            $user->status=-1;
            $user->save();

            // Create a new Company
            $company = new Company;
            $company->user_id = $user->id;
            $company->logo = $logoPath;
            $company->company_name = $request->company_name;
            $company->description = $request->description;
            $company->fullname = $request->fullname;
            $company->phone_number = $request->phone_number;
            $company->city = $request->city;
            $company->facebook = $request->facebook;
            $company->telegram = $request->telegram;
            $company->linkdelin = $request->linkdelin;
            $company->tin_number = $request->tin_number;
            $company->license = $licensePath;
            $company->save();

            DB::commit();

            return back()->with("success", "Company registration successful! Please wait for your account to be approved.
            We will notify you by email.");
         }

         catch(\Exception $e){
            DB::rollback();
            return back()->with("error","error is occured, please try again later");
         }
    }

    public function startUpRegister(Request $request){
        $request->validate([
             "founder_name"=>["required","string","max:255"],
             "email"=>["required","email","string","max:255","unique:".User::class],
             "address"=>["required","string","max:255"],
             "phone_number"=>["required","string","max:13"],
             "business_name"=>["required","string","max:255"],
             "description"=>["required","string","max:1200"],
             "linkdelin"=>["url","max:255","nullable"],
             "facebook"=>["max:255","url","nullable"],
             "telegram"=>["max:255","url","nullable"],
             "password"=>["required","string","min:8","confirmed"]
        ]);
      

        DB::beginTransaction();
        try{
            $user=new User;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->status=-1;
            $user->assignRole('startup');
            $user->save();
    
            $startup=new Startup;
            $startup->user_id=$user->id;
            $startup->founder_name=$request->founder_name;
            $startup->address=$request->address;
            $startup->phone_number=$request->phone_number;
            $startup->business_name=$request->business_name;
            $startup->description=$request->description;
            $startup->linkdelin=$request->linkdelin;
            $startup->facebook=$request->facebook;
            $startup->telegram=$request->telegram;
            $startup->save();
    
             DB::commit();

             return back()->with("success", "Company registration successful! Please wait for your account to be approved.
              We will notify you by email.");

        }

        catch(\Exception $e){

          DB::rollback();
            return back()->with("error","error is occured, please try again later");
        }
    }

    public function index3(){
        $user=User::count();
        if($user == 0){
          return view('auth.adminregister');
           }
        return view("auth.jobseeker");
    }

    public function JobSeekerregister(Request $request){
        
        $request->validate([
            "firstname"=>["required","string","max:255"],
            "lastname"=>["required","string","max:255"],
            "email"=>["required","email","string","max:255","unique:".User::class],
            "phone_number"=>["required","numeric","min:8"],
            "password"=>["required","string","max:255","confirmed"],

        ]);
        

        $user=new User;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->status=1;
        $user->assignRole("jobseeker");
        $user->save();

        $freelance=new Freelancer;
        $freelance->user_id=$user->id;
        $freelance->firstname=$request->firstname;
        $freelance->lastname=$request->lastname;
        $freelance->phone_number=$request->phone_number;
        $freelance->save();

        Auth::user();
        $request->session()->regenerate();

        return  redirect()->route("my-profile")->with("message your register succesfully ,please complete your profile");
        
        


    }
}
