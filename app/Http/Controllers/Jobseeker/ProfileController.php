<?php

namespace App\Http\Controllers\Jobseeker;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        $profile=Freelancer::query()->where("user_id",auth()->user()->id)->first();
        $education=Education::query()->where("freelancer_id",auth()->user()->freelancer->id)->orderBy("created_at","desc")->get();
        $experience=Experience::query()->where("freelancer_id",auth()->user()->freelancer->id)->orderBy("created_at","desc")->get();
        return view("jobseeker.profile.profile",compact("profile","education","experience"));
    }

    public function editprofile(Request $request){
        $this->validate($request,[
            "firstname"=>"required|string|max:255",
            "lastname"=>"required|string|max:255",
            "phone_number"=>"required|string|numeric",
            "about_me"=>"nullable|string|max:1000",
            "profile_image" => "nullable|max:2048|mimes:jpg,png,jpeg,PNG,JPG,JPEG",
            "resume" => "nullable|max:1024|mimes:pdf",
            "skills"=>"nullable|max:255"
        ]);
       

        if($request->hasFile("profile_image")){
          
            $profile=$request->file("profile_image");
             $profilePath=$profile->store("profileImage","public");
        }

        else{
            $profilePath=$request->old_picture;
        }

      

        if ($request->hasFile("resume")) {
          
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
             "resume"=>$resumePath,
             "skills"=>$request->skills
        ]);

        return back()->with("success","profile updated successfully");

        
    }
}
