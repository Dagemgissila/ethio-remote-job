<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobapplicationController extends Controller
{
    //

    public function application(){
        $application=JobApplication::query()->where("freelancer_id",auth()->user()->freelancer->id)->get();
        return view("jobseeker.job.myapplication",compact("application"));
    }

    public function deleteApplication($jobid,$app_id){
      
        $application=JobApplication::query()->where("job_id",$jobid)
        ->where("freelancer_id",auth()->user()->freelancer->id)->first();
        

        $application->delete();

        return back()->with("success","Application for job deleted succesfully");
    }
}
