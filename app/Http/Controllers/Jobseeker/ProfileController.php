<?php

namespace App\Http\Controllers\Jobseeker;

use App\Models\Freelancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        $profile=Freelancer::query()->where("user_id",auth()->user()->id)->first();

        return view("jobseeker.profile.profile",compact("profile"));
    }

    public function editprofile(Request $request){
        $this->validate($request,[
            "firstname"=>"required|string|max:255",
            "lastname"=>"required|string|max:255",
            "phone_number"=>"required|string|numeric",
            "about_me"=>"required|string|max:1000",
            "profile_image" => "nullable|max:2048|mimes:jpg,png,jpeg,PNG,JPG,JPEG",
            "resume" => "nullable|max:1024|mimes:pdf",

        ]);
       

        if($request->has("profile_image")){
            if ($request->old_picture) {
                Storage::delete('public/storage/' . $request->old_picture);
            }
            $profile=$request->file("profile_image");
             $profilePath=$profile->store("profileImage","public");
        }

        else{
            $profilePath=$request->old_picture;
        }

      

        if ($request->has("resume")) {
          
            $resume = $request->file("resume");
            $resumePath = $resume->store("Resume", "public");
        }
        else{
            $resumePath=$request->old_resume;
        }
        
      

        Freelancer::where("user_id",auth()->user()->id)->update([
             "firstname"=>$request->firstname,
             "lastname"=>$request->lastname,
             "phone_number"=>$request->phone_number,
             "about_me"=>$request->about_me,
             "profile_image"=>$profilePath,
             "resume"=>$resumePath
        ]);

        return back()->with("success","profile updated successfully");

        
    }
}
