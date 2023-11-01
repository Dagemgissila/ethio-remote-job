<?php

namespace App\Http\Controllers\Startup;

use App\Models\User;
use App\Models\Startup;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class StartupprofileController extends Controller
{
    public function index(){
        $profile=Startup::query()->where("user_id",auth()->user()->id)->first();
        return view("startup.profile",compact("profile"));
    }

    public function updateProfile(Request $request){
        
        $request->validate([
            "founder_name"=>["required","string","max:255"],
            "email"=>["required","email","string","max:255",Rule::unique('users')->ignore(auth()->user()->id),],
            "address"=>["required","string","max:255"],
            "phone_number"=>["required","string","max:13"],
            "business_name"=>["required","string","max:255"],
            "description"=>["required","string","max:1200"],
            "linkdelin"=>["url","max:255","nullable"],
            "facebook"=>["max:255","url","nullable"],
            "telegram"=>["max:255","url","nullable"],
          
       ]);
    

       Startup::where("user_id",auth()->user()->id)->update([
             "founder_name"=>$request->founder_name,
             "address"=>$request->address,
             "phone_number"=>$request->phone_number,
             "business_name"=>$request->business_name,
             "description"=>$request->description,
             "telegram"=>$request->telegram,
             "facebook"=>$request->facebook,
             "linkdelin"=>$request->linkdelin
       ]);
  
       User::whereId(auth()->user()->id)->update([
         "email"=>$request->email
       ]);

       return back()->with("success","profile updated successfully");
       
  
    }
}
